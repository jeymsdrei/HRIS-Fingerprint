import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Global page loader state — controls skeleton overlay visibility.
Alpine.data('pageLoader', () => ({
    loading: true,
    init() {
        // Hide the skeleton after the whole page has loaded (assets, fonts, etc.)
        const hide = () => {
            // Small delay lets the browser paint the first frame of real content.
            setTimeout(() => {
                this.loading = false;
            }, 120);
        };

        if (document.readyState === 'complete') {
            hide();
        } else {
            window.addEventListener('load', hide, { once: true });
        }

        // Safety fallback so the skeleton never stays forever.
        setTimeout(hide, 2500);
    },
}));

// Reveal data-driven table skeletons when page load completes.
document.addEventListener('DOMContentLoaded', () => {
    // Wait for the page load to trigger, then reveal table rows.
    window.addEventListener('load', () => {
        setTimeout(() => {
            if (window.Alpine) {
                window.Alpine.store('table').loaded = true;
            }
        }, 150);
    }, { once: true });
    // Fallback reveal.
    setTimeout(() => {
        if (window.Alpine) {
            window.Alpine.store('table').loaded = true;
        }
    }, 1200);
});

// Dashboard data-driven chart loading state (reliably accessible from scripts).
Alpine.store('dash', {
    chartsLoaded: false,
});

// Generic data-driven table loading state (used by index tables).
Alpine.store('table', {
    loaded: false,
});

const appContentSelector = '.page-content';
const sidebarScrollStorageKey = 'hris-sidebar-scroll-top';

function persistSidebarScroll() {
    const sidebar = document.querySelector('.sidebar-nav');
    const sidebarContainer = document.querySelector('.sidebar');

    if (sidebar || sidebarContainer) {
        sessionStorage.setItem(sidebarScrollStorageKey, JSON.stringify({
            menu: sidebar?.scrollTop ?? 0,
            container: sidebarContainer?.scrollTop ?? 0,
        }));
    }
}

function restoreSidebarScroll() {
    const sidebar = document.querySelector('.sidebar-nav');
    const sidebarContainer = document.querySelector('.sidebar');

    if (!sidebar && !sidebarContainer) {
        return;
    }

    const savedValue = sessionStorage.getItem(sidebarScrollStorageKey);
    let savedScroll = { menu: 0, container: 0 };

    try {
        savedScroll = savedValue ? JSON.parse(savedValue) : savedScroll;
    } catch {
        savedScroll.menu = Number(savedValue) || 0;
    }

    if (sidebar) {
        sidebar.scrollTop = Number(savedScroll.menu) || 0;
    }

    if (sidebarContainer) {
        sidebarContainer.scrollTop = Number(savedScroll.container) || 0;
    }

    if (!sidebar || sidebar.dataset.scrollPersistenceAttached) {
        return;
    }

    sidebar.dataset.scrollPersistenceAttached = 'true';
    sidebar.addEventListener('scroll', persistSidebarScroll, { passive: true });

    if (sidebarContainer) {
        sidebarContainer.addEventListener('scroll', persistSidebarScroll, { passive: true });
    }
}

function restoreSidebarScrollAfterRender() {
    restoreSidebarScroll();
    requestAnimationFrame(restoreSidebarScroll);
    setTimeout(restoreSidebarScroll, 0);
}

function syncSidebarActiveState(parsedDocument) {
    const currentLinks = document.querySelectorAll('.sidebar-nav a[href]');
    const nextLinks = parsedDocument.querySelectorAll('.sidebar-nav a[href]');

    currentLinks.forEach((currentLink) => {
        const currentUrl = new URL(currentLink.href, window.location.href);
        const matchingLink = [...nextLinks].find((nextLink) => {
            const nextUrl = new URL(nextLink.href, window.location.href);
            return nextUrl.pathname === currentUrl.pathname;
        });

        if (matchingLink) {
            currentLink.classList.toggle('active', matchingLink.classList.contains('active'));
        }
    });
}

function isAppRequest(url) {
    return url.origin === window.location.origin && url.pathname !== '/logout';
}

function getScrollPositions() {
    return {
        page: document.querySelector('.page-content')?.scrollTop ?? 0,
        sidebar: document.querySelector('.sidebar-nav')?.scrollTop ?? 0,
    };
}

function restoreScrollPositions(positions) {
    const pageContent = document.querySelector('.page-content');
    const sidebar = document.querySelector('.sidebar-nav');

    if (pageContent) {
        pageContent.scrollTop = positions.page;
    }

    if (sidebar) {
        sidebar.scrollTop = positions.sidebar;
    }
}

function isExecutableScript(script) {
    const type = script.getAttribute('type');

    return !type || /^(?:text\/javascript|module)$/i.test(type);
}

// Scripts inside swapped content never execute on their own (the HTML spec skips
// them for DOMParser/inserted nodes), so each one must be recreated to run.
function executeContentScripts(root) {
    [...root.querySelectorAll('script')]
        .filter(isExecutableScript)
        .forEach((oldScript) => {
            try {
                const script = document.createElement('script');

                [...oldScript.attributes].forEach(({ name, value }) => script.setAttribute(name, value));
                script.textContent = oldScript.textContent;
                oldScript.replaceWith(script);
            } catch (error) {
                console.error('Failed to run content script:', error);
            }
        });
}

// Content scripts commonly guard their initializers behind DOMContentLoaded,
// which has already fired by the time an SPA swap happens. Views use null
// guards on their element lookups, so re-running stale listeners is safe.
function emitContentLifecycleEvents() {
    document.dispatchEvent(new Event('DOMContentLoaded'));
}

function replaceAppContent(documentHtml, url, scrollPositions) {
    const parsed = new DOMParser().parseFromString(documentHtml, 'text/html');
    const nextContent = parsed.querySelector(appContentSelector);
    const currentContent = document.querySelector(appContentSelector);

    if (!nextContent || !currentContent) {
        return false;
    }

    syncSidebarActiveState(parsed);
    currentContent.replaceWith(nextContent);
    document.title = parsed.title;
    history.scrollRestoration = 'manual';
    window.Alpine.initTree(nextContent);
    executeContentScripts(nextContent);
    emitContentLifecycleEvents();
    requestAnimationFrame(() => restoreScrollPositions(scrollPositions));

    return true;
}

async function loadAppRequest(request, url, pushState = false) {
    const scrollPositions = getScrollPositions();
    const response = await fetch(request, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
    });

    if (!response.ok) {
        throw new Error(`Request failed with status ${response.status}`);
    }

    if (!replaceAppContent(await response.text(), url, scrollPositions)) {
        window.location.href = url.href;
        return;
    }

    if (pushState) {
        history.pushState({}, '', url.href);
    } else {
        history.replaceState({}, '', url.href);
    }
}

document.addEventListener('click', (event) => {
    if (!(event.target instanceof Element)) {
        return;
    }

    if (event.target.closest('.sidebar-nav')) {
        persistSidebarScroll();
    }

    const link = event.target.closest('a');

    if (!link || event.defaultPrevented || link.target || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
        return;
    }

    const url = new URL(link.href);

    if (!isAppRequest(url) || url.hash || link.hasAttribute('download')) {
        return;
    }

    event.preventDefault();
    loadAppRequest(url.href, url, true).catch(() => {
        window.location.href = url.href;
    });
}, true);

document.addEventListener('submit', (event) => {
    const form = event.target;

    if (!form.closest(appContentSelector) || form.method.toLowerCase() === 'get') {
        return;
    }

    const url = new URL(form.action, window.location.href);

    if (!isAppRequest(url)) {
        return;
    }

    event.preventDefault();
    loadAppRequest(new Request(url.href, {
        method: form.method.toUpperCase(),
        body: new FormData(form),
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
    }), url).catch(() => {
        HTMLFormElement.prototype.submit.call(form);
    });
}, true);

window.addEventListener('popstate', () => {
    const url = new URL(window.location.href);
    loadAppRequest(url.href, url).catch(() => {
        window.location.reload();
    });
});

Alpine.start();

document.addEventListener('DOMContentLoaded', restoreSidebarScroll, { once: true });
window.addEventListener('pageshow', restoreSidebarScrollAfterRender);
window.addEventListener('beforeunload', persistSidebarScroll);

restoreSidebarScrollAfterRender();
