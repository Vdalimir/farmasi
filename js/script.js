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

    $('#scrollimg1').scroolly([
        {
            from: 'con-top -1000',
            to: 'con-top',
            cssFrom: {
                width: '150%',
                transform: 'rotate(-90deg)',
                opacity: '0.0'
            },
            cssTo:{
                width: '100%',
                transform: 'rotate(0deg)',
                opacity: '1'
            }
        }
    ], $('.catalog'));
    $('#scrollimg2').scroolly([
        {
            from: 'con-top -1000',
            to: 'con-top',
            cssFrom: {
                transform: 'rotate(90deg)',
                opacity: '0.0'
            },
            cssTo:{
                transform: 'rotate(0deg)',
                opacity: '1'
            }
        }
    ], $('.catalog'));
});