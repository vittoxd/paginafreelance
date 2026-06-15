/* ============================================================
   Kodex Studio — animaciones (JS vanilla, sin librerías)
   ============================================================ */
(function () {
    'use strict';

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var isDesktop = window.matchMedia('(min-width: 769px)').matches;

    /* ---------- 1. Cursor personalizado (solo desktop) ---------- */
    function initCursor() {
        if (!isDesktop || reduceMotion) return;
        var cursor = document.getElementById('kodex-cursor');
        if (!cursor) return;

        document.body.classList.add('kodex-has-cursor');

        var mouseX = window.innerWidth / 2, mouseY = window.innerHeight / 2;
        var curX = mouseX, curY = mouseY;
        var active = false;

        document.addEventListener('mousemove', function (e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
            if (!active) { active = true; cursor.classList.add('is-active'); }
        });

        function render() {
            curX += (mouseX - curX) * 0.18;
            curY += (mouseY - curY) * 0.18;
            cursor.style.transform = 'translate(' + curX + 'px,' + curY + 'px) translate(-50%, -50%)';
            requestAnimationFrame(render);
        }
        render();

        document.querySelectorAll('a, button, .kodex-card').forEach(function (el) {
            el.addEventListener('mouseenter', function () { cursor.classList.add('is-hover'); });
            el.addEventListener('mouseleave', function () { cursor.classList.remove('is-hover'); });
        });
    }

    /* ---------- 2. Scroll reveal ---------- */
    function initReveal() {
        var els = document.querySelectorAll('.kodex-reveal');
        if (!els.length) return;

        if (reduceMotion || !('IntersectionObserver' in window)) {
            els.forEach(function (el) { el.classList.add('visible'); });
            return;
        }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        els.forEach(function (el) { io.observe(el); });
    }

    /* ---------- 3. Kinetic typography (word reveal) ---------- */
    function initKinetic() {
        var containers = document.querySelectorAll('.kodex-words');
        if (!containers.length) return;

        var index = 0;
        containers.forEach(function (c) {
            var words = c.textContent.trim().split(/\s+/);
            c.textContent = '';
            words.forEach(function (w) {
                var word = document.createElement('span');
                word.className = 'word';
                var inner = document.createElement('span');
                inner.className = 'word-inner';
                inner.textContent = w;
                inner.style.transitionDelay = (index * 0.08) + 's';
                word.appendChild(inner);
                c.appendChild(word);
                c.appendChild(document.createTextNode(' '));
                index++;
            });
        });

        if (reduceMotion) {
            containers.forEach(function (c) { c.classList.add('is-revealed'); });
            return;
        }
        setTimeout(function () {
            containers.forEach(function (c) { c.classList.add('is-revealed'); });
        }, 100);
    }

    /* ---------- 4. Contadores animados ---------- */
    function animateCounter(el) {
        var target = parseInt(el.getAttribute('data-target'), 10) || 0;
        var suffix = el.getAttribute('data-suffix') || '';
        var duration = 1800;
        var start = null;

        function step(ts) {
            if (start === null) start = ts;
            var progress = Math.min((ts - start) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 4); // easeOutQuart
            el.textContent = Math.round(target * eased) + suffix;
            if (progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }

    function initCounters() {
        var counters = document.querySelectorAll('.kodex-counter');
        if (!counters.length) return;

        if (reduceMotion || !('IntersectionObserver' in window)) {
            counters.forEach(function (el) {
                el.textContent = (el.getAttribute('data-target') || '') + (el.getAttribute('data-suffix') || '');
            });
            return;
        }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        counters.forEach(function (el) { io.observe(el); });
    }

    /* ---------- 5. Navbar al hacer scroll ---------- */
    function initNavbar() {
        var nav = document.getElementById('kodex-nav');
        if (!nav) return;
        function onScroll() { nav.classList.toggle('is-scrolled', window.scrollY > 20); }
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    function init() {
        initNavbar();
        initReveal();
        initCounters();
        initKinetic();
        initCursor();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
