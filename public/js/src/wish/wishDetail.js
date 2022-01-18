$(document).ready(function () {
    var swiper = new Swiper(".listPicture", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: false,
        touchRatio: 0.2,
    });
    var swiper2 = new Swiper(".bigPicture", {
        spaceBetween: 10,
        allowTouchMove:false,
        autoplay:{
            delay:5000,
            pauseOnMouseEnter:true,
        },
        thumbs: {
            swiper: swiper,
        },
    });

    let proBar = new ProBar({
        // bgColor: "#C4C4C4",
        // color:"#DE3E16",
        bgColor: "#FFF09E",
        color: "#D5B81B",
        speed:0.2,
        wrapper:".progressBar",
        height:10,
        classNameBar : "timer",
        wrapperId : "progressBarId",
        finishAnimation : false,
        rounded : { // use it to round Corners of Probar.
            topLeft : 5,
            topRight : 5,
            bottomLeft : 5,
            bottomRight : 5
        },
        roundedInternal : { // use it to round Corners of Probar (internal).
            topLeft : 5,
            topRight : 5,
            bottomLeft : 5,
            bottomRight : 5
        }
    });

    proBar.goto(50);

})
