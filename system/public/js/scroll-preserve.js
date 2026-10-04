/**
 * Shared scroll-position preservation for authenticated HRIS pages.
 *
 * Loaded once from layouts/hris.blade.php, so every module gets it.
 *
 * Behaviour:
 *   - tracks the page scroll plus any [data-scroll-preserve] inner scrollers
 *   - restores on reload, and on browser Back/Forward via popstate
 *   - re-applies for a short window so late content (charts, fonts) cannot
 *     shift the target, cancelling the moment the user actually scrolls
 *   - discards a stored position on filters, search, pagination and after a
 *     successful save, because those change what the old offset points at
 *
 * Opt an inner scroller in with a stable key:
 *   <div data-scroll-preserve="courses" class="overflow-y-auto">
 * Opt a whole page load out of restoring with:
 *   <div data-scroll-reset>
 */
(function () {
    'use strict';

    if (window.ScrollPreserve) {
        return;
    }

    var STORAGE_NAMESPACE = 'hris:scroll:';
    var RETRY_WINDOW_MS = 900;
    var RETRY_INTERVAL_MS = 60;
    var RESET_REARM_MS = 2000;

    var PAGINATION_SELECTOR =
        'nav[aria-label="Pagination Navigation"] a, .paginator a, .pagination a';

    // Any of these means the listing is different now, so a saved offset is meaningless.
    var RESET_ON_NAVIGATE_SELECTOR = PAGINATION_SELECTOR + ', [data-scroll-reset]';

    var resetRequested = false;
    var userMoved = false;
    var retryTimer = null;

    function requestReset() {
        resetRequested = true;
        clear();

        // The navigation may never happen (cancelled confirm, prevented click).
        // Re-arm saving shortly after so the rest of the page's life is unaffected.
        window.setTimeout(function () {
            resetRequested = false;
        }, RESET_REARM_MS);
    }

    function storageKey() {
        return STORAGE_NAMESPACE + location.pathname;
    }

    function mainScroller() {
        return document.scrollingElement || document.documentElement;
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
        // A reset was requested for this navigation; do not write it back on the
        // way out, otherwise pagehide would re-store the offset we just dropped.
        if (resetRequested) {
            return;
        }

        try {
            sessionStorage.setItem(storageKey(), JSON.stringify(collect()));
        } catch (e) {
            /* storage full or unavailable - scroll preservation is optional */
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

    document.addEventListener('click', function (event) {
        if (!event.target || !event.target.closest) {
            return;
        }

        if (event.target.closest(RESET_ON_NAVIGATE_SELECTOR)) {
            requestReset();
            return;
        }

        if (event.target.closest('a[href]')) {
            save();
        }
    }, true);

    document.addEventListener('submit', function (event) {
        var form = event.target;

        if (!form || !form.tagName) {
            return;
        }

        // A GET form is a filter or search: the result set is about to change.
        if ((form.getAttribute('method') || 'get').toLowerCase() === 'get') {
            requestReset();
            return;
        }

        save();
    }, true);

    window.addEventListener('pagehide', save);

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

        // A success flash means a record was written and the listing shifted.
        if (document.querySelector('[data-scroll-reset]')) {
            requestReset();
            return;
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
        if (!userMoved && !resetRequested) {
            restore();
            scheduleRetries();
        }
    });

    window.addEventListener('pageshow', function (event) {
        // Restored from the back/forward cache: the browser kept the position.
        if (event.persisted) {
            stopRetrying();
        }
    });

    window.ScrollPreserve = { save: save, restore: restore, clear: clear };
})();