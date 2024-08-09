(function ($) {
    $.fn.fwd_tabs = function () {
        return this.each(function () {
            var tabs = $(this);
            var tabMenuList = $(".tab-menu", tabs).children();

            /* Create any missing content areas that are required for AJAX requests */
            for (i = $(".tab-content", tabs).length, j = tabMenuList.length; i < j; i++) {
                tabs.append('<div class="tab-content"></div>');
            }

            var tabContent = $(".tab-content", tabs);

            /* Hide all but the first content area */
            tabContent.slice(1).hide();

            /* Mark the first tab as active by default */
            tabMenuList.eq(0).addClass("active");

            /* Listen for clicks on the tab menu */
            tabMenuList.find("a").click(function (e) {
                var theParent = $(this).parent().index();

                /* Deactivate any other tab menus and make the selected one active */
                tabMenuList.removeClass('active').eq(theParent).addClass('active');

                /* Hide any other content areas and make the selected content area visible */
                tabContent.hide().eq(theParent).show();

                /* If this is an external link and hasn't been called before, load the data into the content area */
                if (tabContent.eq(theParent).html().length == 0 && $(this).attr("href").substr(0, 1) != "#") {
                    var fragment = ($(this).data("fragment") ? " " + $(this).data("fragment") : "");
                    tabContent.eq(theParent).append('<div class="tab-loading"></div>').load($(this).attr("href") + fragment, function (response, status, xhr) {
                        if (status == "error") {
                            tabContent.eq(theParent).html("Sorry, the content could not be loaded");
                        }
                    });
                }
                e.preventDefault();
            });
        });
    }
}(jQuery));


/***********************************************
* Cross browser Marquee II- � Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

var delayb4scroll = 1500 //Specify initial delay before marquee starts to scroll on page (2000=2 seconds)
var marqueespeed = 1.0 //Specify marquee scroll speed (larger is faster 1-10)
var pauseit = 1 //Pause marquee onMousever (0=no. 1=yes)?

////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed = marqueespeed
var pausespeed = (pauseit == 0) ? copyspeed : 0
var actualheight = ''

function scrollmarquee() {
    if (parseInt(cross_marquee.style.top) > (actualheight * (-1) + 8)) //if scroller hasn't reached the end of its height
        cross_marquee.style.top = parseInt(cross_marquee.style.top) - copyspeed + "px" //move scroller upwards
    else //else, reset to original position
        cross_marquee.style.top = parseInt(marqueeheight) + 8 + "px"
}

function initializemarquee() {
    cross_marquee = document.getElementById("vmarquee")
    cross_marquee.style.top = 0
    marqueeheight = document.getElementById("marqueecontainer").offsetHeight
    actualheight = cross_marquee.offsetHeight //height of marquee content (much of which is hidden from view)
    if (window.opera || navigator.userAgent.indexOf("Netscape/7") != -1) { //if Opera or Netscape 7x, add scrollbars to scroll and exit
        cross_marquee.style.height = marqueeheight + "px"
        cross_marquee.style.overflow = "scroll"
        return
    }
    setTimeout('lefttime=setInterval("scrollmarquee()",30)', delayb4scroll)
}

if (window.addEventListener)
    window.addEventListener("load", initializemarquee, false)
else if (window.attachEvent)
    window.attachEvent("onload", initializemarquee)
else if (document.getElementById)
    window.onload = initializemarquee


$(function () { $(".tabs").fwd_tabs(); });