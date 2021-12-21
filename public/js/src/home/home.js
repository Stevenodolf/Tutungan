$(document).ready(function(){
    // $('*').bind('touchmove', false);

    let swiperHomepage = new Swiper(".swiper-container", {
        cssMode: true,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
        },

    });

    let swiperLastMinute = new Swiper(".lastMinuteSwipe", {
        // slidesPerView: 4,
        spaceBetween: 0
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

    let swiperCategory = new Swiper(".categorySwipe", {
        // cssMode: true,
        // loop: true,
        slidesPerView: 7,
        spaceBetween: 0,
        navigation: {
            nextEl: ".nextCategory",
            prevEl: ".prevCategory",
        },
    });
});
