document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.carousel');
    const leftArrow = document.querySelector('.carousel-arrow.left');
    const rightArrow = document.querySelector('.carousel-arrow.right');
    const itemsToShow = 4;
    const itemWidth = document.querySelector('.carousel-item').offsetWidth + 20; // Add gap spacing
    let position = 0;
    const totalItems = document.querySelectorAll('.carousel-item').length;

    let autoScrollInterval = setInterval(function () {
        const maxScroll = -(itemWidth * (totalItems - itemsToShow));
        if (position > maxScroll) {
            position -= itemWidth;
        } else {
            position = 0; // Resets to the beginning when Carousel ends
        }
        carousel.style.transform = `translateX(${position}px)`;
    }, 5000);


    leftArrow.addEventListener('click', function () {
        if (position < 0) {
            position += itemWidth;
            carousel.style.transform = `translateX(${position}px)`;
        }
    });

    rightArrow.addEventListener('click', function () {
        const maxScroll = -(itemWidth * (totalItems - itemsToShow));
        if (position > maxScroll) {
            position -= itemWidth;
            carousel.style.transform = `translateX(${position}px)`;
        }
    });
});