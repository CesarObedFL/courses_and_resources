var t, togg = true;

$(".loading").on({
    "click": function (e) {
        clearTimeout(t);
        togg = !togg;
        $(this).trigger("reset");
    },

    "saved": function (e) {
        $(this).addClass("ok").removeClass("danger").text("OK");
    },

    "error": function (e) {
        $(this).addClass("danger").removeClass("ok").text("ERROR");
    },

    "reset": function (e) {
        $(this).removeClass("ok danger").text("SAVING");

        t = setTimeout(function () {
            if (!togg) {
                $(".loading").trigger("saved");

            } else {
                $(".loading").trigger("error");
            }

        }, 3000);
    }

}).trigger("reset");



