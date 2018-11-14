//Example Slick Slider config. Works for most use cases.
/* $(document).ready(function(){
    $('.slick-slider').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        adaptiveHeight: true 
    }); 
}); */

$('.mobile-nav-button').on('click', function(){
    $(this).toggleClass('active-nav');
    $('.main-navigation').toggleClass('active-main');
});

$(document).on('click', '.active-main', 'a', function(){
    $('.mobile-nav-button').removeClass('active-nav');
    $(this).removeClass('active-main');
})

//For Gravity Forms Post Registration
$(document).bind('gform_confirmation_loaded', function(){
    postRegistration();
});

function postRegistration(){
    //For Facebook remarketing if used
    //fbq('track', 'CompleteRegistration');
}

//DEPRECATED - Use href="#" instead of the below - code in smooth-scroll.js
/* function scrollTo(element, targetElement){
    $(element).on('click', function(){
        $('html, body').animate({
            scrollTop: $(targetElement).offset().top
        }, 500);
    })
} */