
var tab = $(".tab"),
    menus = $(".menu li"),
    contents = $(".content>div"),
    cur = 0,
    timer = null;

menus.on("click", function () {
    var _this = $(this);
    var thisIndex = _this.index();
    cur = thisIndex;

    _this.addClass("active").siblings().removeClass("active");
    contents.eq(thisIndex).stop(true).slideDown().siblings().stop(true).slideUp();

});


function autoPlay() {
    timer = setInterval(function () {
        if (cur > menus.length - 1) {
            cur = 0;
        }
        menus.eq(cur).trigger("click");
        cur++;
    }, 2000);
}

