/**
 * Shared behaviour for the HRIS password recovery screens.
 *
 * Covers:
 *   - submit lock + loading overlay
 *   - square verification-code inputs (auto-advance, paste, arrows, backspace)
 *   - password visibility toggle
 *   - live password strength meter and confirmation match hint
 */
(function () {
    'use strict';

    /* ---------- Submit lock + loading overlay ---------- */
    (function () {
        var overlay = document.getElementById('recoveryLoadingOverlay');
        var duration = 650;
        var timer;

        function showOverlay() {
            if (!overlay) {
                return;
            }
            overlay.hidden = false;
            window.clearTimeout(timer);
            timer = window.setTimeout(function () {
                overlay.hidden = true;
            }, duration);
        }

        document.querySelectorAll('form[data-recovery-form]').forEach(function (form) {
            form.addEventListener('submit', function () {
                if (this.dataset.submitting === 'true') {
                    return;
                }
                this.dataset.submitting = 'true';

                var button = this.querySelector('.btn-primary');
                if (button) {
                    button.classList.add('is-submitting');
                }
                showOverlay();
            });
        });
    })();

    /* ---------- Square verification-code inputs ---------- */
    document.querySelectorAll('.otp-inputs').forEach(function (wrap) {
        var hidden = document.getElementById(wrap.dataset.target || 'codeValue');
        var boxes = Array.prototype.slice.call(wrap.querySelectorAll('.otp-box'));
        if (!boxes.length) {
            return;
        }

        function sync() {
            boxes.forEach(function (box) {
                box.value = box.value.replace(/\D/g, '').slice(0, 1);
                box.classList.toggle('is-filled', box.value !== '');
            });

            if (hidden) {
                hidden.value = boxes.map(function (box) {
                    return box.value;
                }).join('');
            }
        }

        function focusBox(index) {
            if (index >= 0 && index < boxes.length) {
                boxes[index].focus();
                boxes[index].select();
            }
        }

        function fill(value) {
            value.replace(/\D/g, '').split('').forEach(function (digit, position) {
                if (boxes[position]) {
                    boxes[position].value = digit;
                }
            });
            sync();
        }

        boxes.forEach(function (box, index) {
            box.addEventListener('input', function () {
                sync();
                if (this.value && index < boxes.length - 1) {
                    focusBox(index + 1);
                }
            });

            box.addEventListener('keydown', function (event) {
                if (event.key === 'Backspace' && !this.value && index > 0) {
                    event.preventDefault();
                    boxes[index - 1].value = '';
                    sync();
                    focusBox(index - 1);
                } else if (event.key === 'ArrowLeft' && index > 0) {
                    event.preventDefault();
                    focusBox(index - 1);
                } else if (event.key === 'ArrowRight' && index < boxes.length - 1) {
                    event.preventDefault();
                    focusBox(index + 1);
                }
            });

            box.addEventListener('focus', function () {
                this.select();
            });

            box.addEventListener('paste', function (event) {
                event.preventDefault();
                var digits = (event.clipboardData || window.clipboardData).getData('text').replace(/\D/g, '');
                boxes.forEach(function (target, position) {
                    target.value = digits[position] || '';
                });
                sync();
                focusBox(Math.min(digits.length, boxes.length - 1));
            });
        });

        // Restore a previous attempt (e.g. after a validation error).
        if (wrap.dataset.previous) {
            fill(wrap.dataset.previous);
        }

        sync();
        if (!boxes.some(function (box) { return box.value; })) {
            boxes[0].focus();
        }
    });

    /* ---------- Password visibility toggle ---------- */
    document.querySelectorAll('.password-toggle').forEach(function (toggle) {
        var input = document.getElementById(toggle.dataset.target);
        if (!input) {
            return;
        }

        toggle.addEventListener('click', function () {
            var isVisible = input.type === 'text';
            input.type = isVisible ? 'password' : 'text';
            toggle.setAttribute('aria-label', isVisible ? 'Show password' : 'Hide password');
            toggle.setAttribute('title', isVisible ? 'Show password' : 'Hide password');
            toggle.classList.toggle('is-visible', !isVisible);
            input.focus();
        });
    });

    /* ---------- Password strength + confirmation match ---------- */
    (function () {
        var password = document.getElementById('password');
        var meter = document.getElementById('passwordStrength');
        var confirmInput = document.getElementById('password_confirmation');
        var confirmHint = document.getElementById('confirmHint');
        var toggle = document.getElementById('submitButton');

        if (!password) {
            return;
        }

        function score(value) {
            if (!value) {
                return { level: '', label: 'Password strength' };
            }

            var classes = 0;
            if (/[a-z]/.test(value)) { classes++; }
            if (/[A-Z]/.test(value)) { classes++; }
            if (/\d/.test(value)) { classes++; }
            if (/[^A-Za-z0-9]/.test(value)) { classes++; }

            if (value.length >= 12 && classes >= 3) {
                return { level: 'strength-strong', label: 'Strong password' };
            }
            if (value.length >= 10 && classes >= 2) {
                return { level: 'strength-strong', label: 'Strong password' };
            }
            if (value.length >= 8) {
                return { level: 'strength-good', label: 'Good password' };
            }
            if (value.length >= 6) {
                return { level: 'strength-fair', label: 'Fair password' };
            }
            return { level: 'strength-weak', label: 'Too short — use at least 8 characters' };
        }

        function update() {
            var value = password.value;
            var result = score(value);

            if (meter) {
                var fill = meter.querySelector('.strength-fill');
                var text = meter.querySelector('.strength-text');

                fill.className = 'strength-fill' + (result.level ? ' ' + result.level : '');
                fill.style.width = value ? ({ 'strength-weak': '25%', 'strength-fair': '50%', 'strength-good': '75%', 'strength-strong': '100%' })[result.level] : '0%';
                text.textContent = result.label;
            }

            if (confirmInput && confirmHint) {
                if (!confirmInput.value) {
                    confirmHint.textContent = 'Both passwords must match.';
                    confirmHint.className = 'field-hint';
                } else if (confirmInput.value === value) {
                    confirmHint.textContent = 'Passwords match.';
                    confirmHint.className = 'field-hint match-success';
                } else {
                    confirmHint.textContent = 'Passwords do not match.';
                    confirmHint.className = 'field-hint match-error';
                }
            }

            if (toggle) {
                var length = value.length;
                toggle.disabled = length < 8;
                toggle.style.opacity = length < 8 ? '0.6' : '';
                toggle.style.cursor = length < 8 ? 'not-allowed' : '';
            }
        }

        password.addEventListener('input', update);
        if (confirmInput) {
            confirmInput.addEventListener('input', update);
        }
        update();
    })();
})();