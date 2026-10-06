/**
 * Shared scroll-position preservation for authenticated HRIS pages.
 *
 * Loaded once from layouts/hris.blade.php, so every module gets it.
 *
 * Behaviour:
 *   - tracks the page scroll plus any [data-scroll-preserve] inner scrollers
 *   - restores on reload, full-page navigation, and browser Back/Forward
 *   - re-applies while page content is loading, cancelling when the user scrolls
 *
 * Opt an inner scroller in with a stable key:
 *   <div data-scroll-preserve="courses" class="overflow-y-auto">
 */
(function () {
    'use strict';

    if (window.ScrollPreserve) {
        return;
    }

    var STORAGE_NAMESPACE = 'hris:scroll:';
    var RETRY_WINDOW_MS = 2500;
    var RETRY_INTERVAL_MS = 60;
    var PENDING_STORAGE_KEY = STORAGE_NAMESPACE + 'pending-navigation';
    var userMoved = false;
    var retryTimer = null;

    function storageKey() {
        return STORAGE_NAMESPACE + location.pathname + location.search;
    }

    function mainScroller() {
        return document.querySelector('.page-content')
            || document.scrollingElement
            || document.documentElement;
    }

    function innerScrollers() {
        return Array.prototype.slice.call(
            document.querySelectorAll('[data-scroll-preserve]')
        );
    }

    function collect() {
        var scroller = mainScroller();
        var state = { main: scroller ? scroller.scrollTop : 0, inner: {} };

        innerScrollers().forEach(function (el) {
            var key = el.getAttribute('data-scroll-preserve');
            if (key) {
                state.inner[key] = el.scrollTop;
            }
        });

        return state;
    }

    function read() {
        try {
            var raw = sessionStorage.getItem(storageKey());
            return raw ? JSON.parse(raw) : null;
        } catch (e) {
            return null;
        }
    }

    function apply(state) {
        if (!state) {
            return;
        }

        var scroller = mainScroller();
        if (scroller && typeof state.main === 'number' && state.main > 0) {
            scroller.scrollTop = state.main;
        }

        innerScrollers().forEach(function (el) {
            var key = el.getAttribute('data-scroll-preserve');
            if (key && typeof state.inner[key] === 'number') {
                el.scrollTop = state.inner[key];
            }
        });
    }

    function clear() {
        try {
            sessionStorage.removeItem(storageKey());
        } catch (e) {
            /* storage unavailable - scroll preservation is optional */
        }
    }

    function save() {
        try {
            sessionStorage.setItem(storageKey(), JSON.stringify(collect()));
        } catch (e) {
            /* storage full or unavailable - scroll preservation is optional */
        }
    }

    function saveBeforeNavigation() {
        var state = collect();

        try {
            sessionStorage.setItem(storageKey(), JSON.stringify(state));
            sessionStorage.setItem(PENDING_STORAGE_KEY, JSON.stringify(state));
        } catch (e) {
            /* storage full or unavailable - scroll preservation is optional */
        }
    }

    function readPendingNavigation() {
        try {
            var raw = sessionStorage.getItem(PENDING_STORAGE_KEY);
            sessionStorage.removeItem(PENDING_STORAGE_KEY);
            return raw ? JSON.parse(raw) : null;
        } catch (e) {
            return null;
        }
    }

    function stopRetrying() {
        if (retryTimer !== null) {
            window.clearTimeout(retryTimer);
            retryTimer = null;
        }
    }

    function restore() {
        apply(read());
    }

    function scheduleRetries() {
        stopRetrying();

        var deadline = new Date().getTime() + RETRY_WINDOW_MS;

        var tick = function () {
            if (userMoved) {
                retryTimer = null;
                return;
            }

            restore();

            retryTimer = new Date().getTime() < deadline
                ? window.setTimeout(tick, RETRY_INTERVAL_MS)
                : null;
        };

        retryTimer = window.setTimeout(tick, RETRY_INTERVAL_MS);
    }

    function cancelRetriesOnUserInput() {
        if (userMoved) {
            return;
        }

        userMoved = true;
        stopRetrying();
    }

    ['wheel', 'touchmove', 'keydown'].forEach(function (type) {
        window.addEventListener(type, cancelRetriesOnUserInput, { capture: true });
    });

    document.addEventListener('scroll', save, true);

    document.addEventListener('click', function (event) {
        if (!event.target || !event.target.closest) {
            return;
        }

        if (event.target.closest('a[href], button')) {
            save();
        }
    }, true);

    document.addEventListener('submit', function (event) {
        var form = event.target;

        if (!form || !form.tagName) {
            return;
        }

        save();
    }, true);

    window.addEventListener('pagehide', saveBeforeNavigation);

    // Back/Forward restores cross-document, and we suppress the browser's own
    // handling below, so we have to put the position back ourselves.
    window.addEventListener('popstate', function () {
        userMoved = false;
        restore();
        scheduleRetries();
    });

    function init() {
        if ('scrollRestoration' in window.history) {
            window.history.scrollRestoration = 'manual';
        }

        var pendingState = readPendingNavigation();
        if (pendingState) {
            try {
                sessionStorage.setItem(storageKey(), JSON.stringify(pendingState));
            } catch (e) {
                /* storage full or unavailable - scroll preservation is optional */
            }
        }

        restore();
        scheduleRetries();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    window.addEventListener('load', function () {
        if (!userMoved) {
            restore();
            scheduleRetries();
        }
    });

    window.addEventListener('pageshow', function (event) {
        // Restored from the back/forward cache: the browser kept the position.
        if (event.persisted) {
            stopRetrying();
            try {
                sessionStorage.removeItem(PENDING_STORAGE_KEY);
            } catch (e) {
                /* storage unavailable - scroll preservation is optional */
            }
        }
    });

    window.ScrollPreserve = { save: save, restore: restore, clear: clear };
})();