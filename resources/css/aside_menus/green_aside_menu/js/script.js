$(document).ready(function () {
    $(".main-menu").click(function () {
        if (!$(this).hasClass("main-menu-open")) {
            $(this).addClass("main-menu-open");
        } else {
            $(this).removeClass("main-menu-open");
        }
    });

});