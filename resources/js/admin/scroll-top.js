document.addEventListener('scroll', () => {
    const btn = document.querySelector('.scroll-to-top');
    if (!btn) return;

    if (window.scrollY > 200) {
        btn.classList.add('show');
    } else {
        btn.classList.remove('show');
    }
});
