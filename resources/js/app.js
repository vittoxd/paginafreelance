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
