jQuery(document).ready(function () {
    const mainNav = $('#mainNav');
    const burger = $('#mainNavBurger');
    const link = $('.nav-content span');

    burger.on('click', function () {
        clickMainNav();
    });
    link.on('click', function () {
        clickMainNav();
    });

    function clickMainNav() {
        burger.toggleClass('burger-open')
        mainNav.toggleClass('main-nav-open');
    }

});
