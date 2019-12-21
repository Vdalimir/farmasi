$( document ).ready(function() {
    $('.burger').click( function () {
        $('.nav ul').toggleClass("nav-active");
        $('.nav').toggleClass("active");
        $(this).find('div').toggleClass("toggle");
    });
    $(".owl-carousel").owlCarousel({
        items:1,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true
    });


});