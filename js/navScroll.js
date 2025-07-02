
    document.addEventListener('DOMContentLoaded', function () {
    const nav = document.querySelector('.responsive-nav');

    window.addEventListener('scroll', function () {
    if (window.scrollY > 50) { // Adjust the threshold as needed
    nav.classList.add('scrolled');
} else {
    nav.classList.remove('scrolled');
}
});
});

