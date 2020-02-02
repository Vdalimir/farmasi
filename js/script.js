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

    $('#view-stock-img').click( function () {
        $('.view-img').toggleClass('active');
    });
    $('#close-stock').click( function () {
        $('.view-img').toggleClass('active');
    });

    $('#open_marketing').click( function () {
        $('.view-marketing').toggleClass('active');
    });
    $('#close-marketing').click( function () {
        $('.view-marketing').toggleClass('active');
    });
    $('#user_phone').mask('+00 (000) 000 00 00', {placeholder: "+__ (___) ___ __ __"});

    $.extend( $.validator.messages, {
        required: "Это поле необходимо заполнить.",
        remote: "Пожалуйста, введите правильное значение.",
        number: "Пожалуйста, введите число.",
        digits: "Пожалуйста, вводите только цифры.",
        maxlength: $.validator.format( "Пожалуйста, введите не больше {0} символов." ),
        minlength: $.validator.format( "Пожалуйста, введите не меньше {0} символов." ),
        rangelength: $.validator.format( "Пожалуйста, введите значение длиной от {0} до {1} символов." ),
        range: $.validator.format( "Пожалуйста, введите число от {0} до {1}." ),
        max: $.validator.format( "Пожалуйста, введите число, меньшее или равное {0}." ),
        min: $.validator.format( "Пожалуйста, введите число, большее или равное {0}." )
    } );
    $('#form_registration').validate({
        rules: {
            first_name: {
                required: true
            },
            check_policy: "required",
            user_city: {
                required: true,  // <-- redundant
            },
            user_phone: {
                required: true,
                minlength: 10
            }
        }
    });
    $('#form_registration input').on('keyup change', function () { // fires on every keyup & blur
        if ($('#form_registration').valid()) {                   // checks form for validity
            $('#start_registration').prop('disabled', false);        // enables button
        } else {
            $('#start_registration').prop('disabled', 'disabled');   // disables button
        }
    });

    $('#start_registration').click( function () {
        var firstName = $('#first_name').val();
        var userCity = $('#user_city').val();
        var phoneNumber = $('#user_phone').val();
        var target = $('#target').val();
        var comment = $('#comment').val();
        $('.form-send-preload').fadeIn(100);
        $.ajax({
            type: 'POST',
            url: 'sendmail.php',
            data: {first_name: firstName, user_city: userCity,
                user_phone: phoneNumber, target: target, comment: comment},
            success: function (data) {
                if (data === "1"){
                    $('.form-send-preload').fadeOut(100);
                    $('.mui-form').fadeOut(100);
                    $('.form-send-success').delay(100).fadeIn(500);
                } else {
                    $('#first_name').val("");
                    $('#user_city').val("");
                    $('#user_phone').val("");
                    $('#comment').val("");
                    $('.form-send-preload').fadeOut(100);
                    $('.mui-form').fadeOut(100);
                    $('.form-send-error').delay(100).fadeIn(500);
                    setTimeout(function () {
                        $('.form-send-error').fadeOut(500);
                        $('.mui-form').fadeIn(500);
                    },5000);

                }
            }
        });
    });

    $('.del_phone_number').click( function () {
        var $del_id = $(this).attr('id');
        $.ajax({
            type:'POST',
            url:'addphonenumber.php',
            data: {delete_id: $del_id},
            success: function(data){
                if(data === '1'){
                    $('.del_phone_number').each(function () {
                        if($(this).attr('id') === $del_id){
                            $(this).closest('form').fadeOut();
                        }
                    });
                }
                else alert("Запись не удалена. Обратитесь к админу +380660668090");
            }
        });
    });

});
'use strict';
( function( $, window, document, undefined )
{
    $( '.inputfile' ).each( function()
    {
        var $input	 = $( this ),
            $label	 = $input.next( 'label' ),
            labelVal = $label.html();

        $input.on( 'change', function( e )
        {
            var fileName = '';

            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                $label.find( 'span' ).html( fileName );
            else
                $label.html( labelVal );
        });

        // Firefox bug fix
        $input
            .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
            .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
    });
})
( jQuery, window, document );