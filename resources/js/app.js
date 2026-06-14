// ===== Animaciones de aparición al hacer scroll =====
// IntersectionObserver avisa cuando un elemento entra en pantalla.
const revealEls = document.querySelectorAll('.reveal');

if ('IntersectionObserver' in window && revealEls.length) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target); // se anima una sola vez
                }
            });
        },
        { threshold: 0.12 },
    );

    revealEls.forEach((el) => observer.observe(el));
} else {
    // Si el navegador no lo soporta, mostramos todo sin animar.
    revealEls.forEach((el) => el.classList.add('is-visible'));
}

// ===== Sombra en la barra de navegación al hacer scroll =====
const header = document.getElementById('site-header');

if (header) {
    const toggleShadow = () => {
        header.classList.toggle('shadow-md', window.scrollY > 8);
    };
    toggleShadow();
    window.addEventListener('scroll', toggleShadow, { passive: true });
}

// ===== Barra de progreso de lectura (arriba) =====
const progressBar = document.getElementById('scroll-progress');

if (progressBar) {
    const updateProgress = () => {
        const scrollable = document.documentElement.scrollHeight - window.innerHeight;
        const percent = scrollable > 0 ? (window.scrollY / scrollable) * 100 : 0;
        progressBar.style.width = percent + '%';
    };
    updateProgress();
    window.addEventListener('scroll', updateProgress, { passive: true });
}

// ===== Números que cuentan hacia arriba al entrar en pantalla =====
const counters = document.querySelectorAll('.stat-count');

if ('IntersectionObserver' in window && counters.length) {
    const countObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const target = parseInt(el.dataset.target, 10) || 0;
                const prefix = el.dataset.prefix || '';
                const suffix = el.dataset.suffix || '';
                const duration = 1200;
                const start = performance.now();

                const tick = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    // easeOutCubic para que desacelere al final
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = prefix + Math.round(target * eased) + suffix;
                    if (progress < 1) requestAnimationFrame(tick);
                };

                requestAnimationFrame(tick);
                countObserver.unobserve(el);
            });
        },
        { threshold: 0.5 },
    );

    counters.forEach((el) => countObserver.observe(el));
}
