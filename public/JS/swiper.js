const swiper = new Swiper(".swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,

    // If we need pagination
    // pagination: {
    //     el: ".swiper-pagination",
    // },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        // when window width is >= 640px
        768: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
    },
});
