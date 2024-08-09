$(document).ready(function () {

    $('.nav-container').click(function () {
        if ($('aside').hasClass('')) {
            $('aside').addClass('is-clicked');
            $('.nav-container').addClass('nav-clicked');
        } else {
            $('aside').removeClass('is-clicked');
            $('.nav-container').removeClass('nav-clicked');
        }
    });

})