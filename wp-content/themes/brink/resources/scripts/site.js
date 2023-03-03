// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

jQuery(document).ready(function($){

    jQuery('.slick-rotator').not('.slick-initialized').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToScroll: 1,
    });

    jQuery('.nav .search a').on('click', function(e){
        e.preventDefault();

        jQuery('.search-box').toggleClass('open');

    });

    $('.nav .menu-item-has-children').hoverIntent(
        {
        timeout: 200,
        over: function(){
            $('.nav .menu-item-has-children').not($(this)).removeClass('active');
            $(this).toggleClass('active');
        },
        out: function(){
            $('.nav .menu-item-has-children').not($(this)).removeClass('active');
            $(this).toggleClass('active');
        }
    });

    jQuery('.mobile-trigger').on('click', function(){
        jQuery('.nav').toggleClass('open');
        jQuery('.search-box').toggleClass('open');
    });

});