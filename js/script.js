$( document ).ready(function() {
    $('.burger').click( function () {
        $('.nav ul').toggleClass("nav-active");
        $('.nav').toggleClass("active");
        $(this).find('div').toggleClass("toggle");
    });
    $(".owl-carousel").owlCarousel({
        loop: true,
        items:1,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true
    });

    $('#scrollimg1').scroolly([
        {
            from: 'con-top -1000',
            to: 'con-top',
            cssFrom: {
                top: '1%',
                opacity: '0.0'
            },
            cssTo:{
                top: '50%',
                opacity: '1'
            }
        }
    ], $('.catalog'));
    $('#scrollimg2').scroolly([
        {
            from: 'con-top -1000',
            to: 'con-top',
            cssFrom: {
                top: '100%',
                opacity: '0.0'
            },
            cssTo:{
                top: '50%',
                opacity: '1'
            }
        }
    ], $('.catalog'));
});