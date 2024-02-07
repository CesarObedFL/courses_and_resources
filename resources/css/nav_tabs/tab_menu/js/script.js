$(document).ready(function() {

    $(".tab").click(function() {
        $(".active").removeClass('active');
        $(this).parents('li').addClass('active');
    });

});