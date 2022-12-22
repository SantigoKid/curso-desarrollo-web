$(document).ready(function () {
    $('#btnHide').click(function() {
        $('p').hide(1500);
    });

    $('#btnShow').click(function() {
        $('p').show(3000);
    });

    $('#btnToggle').click(function() {
        $('p').toggle(500);
    });

    // fade
    $('#btnFadeIn').click(function() {
        $('p').fadeIn();
    });

    $('#btnFadeOut').click(function() {
        $('p').fadeOut();
    });

    $('#btnFadeToggle').click(function() {
        $('p').fadeToggle();
    });

    $('#btnFadeTo').click(function() {
        $('p').fadeTo('slow', 0.3);
    });

    // slide
    $('.blue').click(function (){
        $('#divSlide').slideToggle(8000);
    });
});
