$(document).ready(function(){
    // $('*').bind('touchmove', false);

    let swiperHomepage = new Swiper(".swiper-container", {
        cssMode: true,
        loop: true,
        disableOnInteraction: true,
        autoplay: {
            delay: 10000,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: 'true'
        },

    });

    let swiperLastMinute = new Swiper(".lastMinuteSwipe", {
        slidesPerView: 'auto',
        spaceBetween: 0,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    let swiperCategory = new Swiper(".categorySwipe", {
        // cssMode: true,
        // loop: true,
        slidesPerView: 'auto',
        spaceBetween: 30,
        centeredSlides:true,
        centeredSlidesBounds:true,
        navigation: {
            nextEl: ".nextCategory",
            prevEl: ".prevCategory",
        },
    });

    let proBar = new ProBar({
        bgColor: "#C4C4C4",
        color:"#DE3E16",
        speed:0.2,
        wrapper:".progressBar",
        height:10,
        classNameBar : "timer",
        wrapperId : "progressBarId",
        finishAnimation : false,
        rounded : { // use it to round Corners of Probar.
            topLeft : 2,
            topRight : 2,
            bottomLeft : 2,
            bottomRight : 2
        },
        roundedInternal : { // use it to round Corners of Probar (internal).
            topLeft : 2,
            topRight : 2,
            bottomLeft : 2,
            bottomRight : 2
        }
    });

    proBar.goto(30);
});
