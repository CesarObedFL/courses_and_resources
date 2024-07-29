// by Luca Rensch Ellypite

window.onscroll = function () { scrollFunction() };

function scrollFunction() {

    // Reduction of navigation
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("retract").style.width = "100px";
    } else {
        document.getElementById("retract").style.width = "1000px";
    }

    // Menu plays hide and seak
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("menu").style.display = "block";
    } else {
        document.getElementById("menu").style.display = "none";
    }

    // Navigation text plays hide and seak
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("text").style.visibility = "hidden";
    } else {
        document.getElementById("text").style.visibility = "visible";
    }

    // Small navigation can only play with the other by clicking the menu
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("little_nav").style.display = "none";
    } else {
        document.getElementById("little_nav").style.display = "none";
    }
}

// Show Small navigation
function myFunction() {
    var x = document.getElementById("little_nav");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

