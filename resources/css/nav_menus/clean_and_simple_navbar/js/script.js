$(document).ready(function() {
    let menuIcon = $('.menuIcon');
    let nav = $('.overlay-menu');

    menuIcon.click(function() {
        if ( !menuIcon.hasClass('toggle') ) {
            nav.css({
                'transform': 'translateX(0%)',
                'transition': 'transform 0.2s ease-out'
            });
            menuIcon.addClass('toggle');
        } else {
            nav.css({
                'transform': 'translateX(-100%)',
                'transition': 'transform 0.2s ease-out'
            });
            menuIcon.removeClass('toggle');
        }
    });
});

