$(document).ready(function() {

    var elemParent = $('.aside-menu');
    $(".conf-button").on('click', function () {
        elemParent.toggleClass('open');
    });

});