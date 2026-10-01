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

    const responseUrl = new URL(response.url, window.location.href);

    if (!replaceAppContent(await response.text(), responseUrl, scrollPositions)) {
        window.location.href = responseUrl.href;
        return;
    }

    if (pushState) {
        history.pushState({}, '', responseUrl.href);
    } else {
        history.replaceState({}, '', responseUrl.href);
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

window.addEventListener('popstate', () => {
    const url = new URL(window.location.href);
    loadAppRequest(url.href, url).catch(() => {
        window.location.reload();
    });
});

Alpine.start();

// Profile picture hover/click preview — works for every avatar on the page,
// including after SPA content swaps (uses event delegation on document).
(function () {
    let previewEl = null;
    let currentAnchor = null;

    const PREVIEW_SIZE = 160;

    function ensurePreview() {
        if (!previewEl) {
            previewEl = document.createElement('img');
            Object.assign(previewEl.style, {
                position: 'fixed',
                zIndex: '999',
                width: `${PREVIEW_SIZE}px`,
                height: `${PREVIEW_SIZE}px`,
                objectFit: 'cover',
                borderRadius: '12px',
                border: '4px solid #ffffff',
                boxShadow: '0 20px 25px -5px rgba(0, 0, 0, 0.25), 0 8px 10px -6px rgba(0, 0, 0, 0.1)',
                pointerEvents: 'none',
                display: 'none',
            });
            document.body.appendChild(previewEl);
        }

        return previewEl;
    }

    function layoutPreview() {
        if (!currentAnchor) return;

        const preview = ensurePreview();
        const rect = currentAnchor.getBoundingClientRect();
        const width = preview.offsetWidth || PREVIEW_SIZE;
        const height = preview.offsetHeight || PREVIEW_SIZE;

        let left = rect.right + 8;
        if (left + width > window.innerWidth - 8) {
            left = Math.max(8, rect.left - width - 8);
        }

        const top = Math.max(8, Math.min(window.innerHeight - height - 8, rect.top + rect.height / 2 - height / 2));

        preview.style.left = `${left}px`;
        preview.style.top = `${top}px`;
        preview.style.display = 'block';
    }

    function showPreview(target) {
        currentAnchor = target;
        const preview = ensurePreview();
        preview.src = target.currentSrc || target.src;
        preview.alt = target.alt || '';
        layoutPreview();
    }

    function hidePreview() {
        currentAnchor = null;
        if (previewEl) previewEl.style.display = 'none';
    }

    document.addEventListener('mouseover', (event) => {
        const target = event.target.closest('[data-avatar-preview]');
        if (target) showPreview(target);
    });

    document.addEventListener('mouseout', (event) => {
        if (event.target.closest('[data-avatar-preview]')) hidePreview();
    });

    window.addEventListener('scroll', layoutPreview, { passive: true });
    window.addEventListener('resize', layoutPreview);
})();

// Photo upload preview — delegated so it works after SPA swaps and full loads.
document.addEventListener('change', (event) => {
    const input = event.target.closest('[data-photo-input]');
    if (!input) return;

    const file = input.files?.[0];
    const error = document.querySelector('#employee-photo-error');
    const preview = document.querySelector('#employee-photo-preview');
    const placeholder = document.querySelector('#employee-photo-placeholder');

    if (error) {
        error.classList.add('hidden');
        error.textContent = '';
    }

    if (!file) return;

    if (!['image/jpeg', 'image/png'].includes(file.type) || file.size > 2 * 1024 * 1024) {
        input.value = '';
        if (error) {
            error.textContent = 'Choose a JPG or PNG image no larger than 2 MB.';
            error.classList.remove('hidden');
        }
        return;
    }

    if (preview) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    }
    if (placeholder) placeholder.classList.add('hidden');
});

// Prevent duplicate employee-form submissions — delegated for SPA safety.
document.addEventListener('submit', (event) => {
    const form = event.target.closest('[data-employee-form]');
    if (!form) return;

    const button = form.querySelector('[data-submit-once]');
    if (!button) return;

    if (form.dataset.submitting === 'true') {
        event.preventDefault();
        return;
    }

    form.dataset.submitting = 'true';
    button.disabled = true;
    button.classList.add('opacity-75', 'cursor-not-allowed');
    button.querySelector('svg')?.classList.add('animate-spin');
});

document.addEventListener('DOMContentLoaded', restoreSidebarScroll, { once: true });
window.addEventListener('pageshow', restoreSidebarScrollAfterRender);
window.addEventListener('beforeunload', persistSidebarScroll);

restoreSidebarScrollAfterRender();
