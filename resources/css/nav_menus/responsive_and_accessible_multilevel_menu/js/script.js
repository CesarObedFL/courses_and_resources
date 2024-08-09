// Documentation
// https://jolty-ui.com

import {
    Dropdown,
    Dialog,
    Tablist
} from "https://cdn.jsdelivr.net/npm/jolty@0.6.1/dist/jolty.esm.min.js";

new Dialog("#mob-nav", {
    shown: false,
    breakpoints: {
        1024: {
            destroy: true
        }
    }
});

document.querySelectorAll(".nav-submenu").forEach((submenu) => {
    new Dropdown(submenu, {
        toggler: submenu.previousElementSibling,
        delay: 100,
        itemClickHide: false,
        items: ":scope > li > a",
        trigger: "click hover",
        arrowActivation: submenu.parentNode.closest(".nav-submenu") ? "x" : "y",
        stateMode: "class-shown",
        destroy: true,
        breakpoints: {
            1024: {
                destroy: false
            }
        }
    });
});

document.querySelectorAll(".nav-submenu, .nav-menu").forEach((submenu) => {
    new Tablist(submenu, {
        tab: "a:not(:only-child)",
        tabpanel: ".nav-submenu",
        stateMode: "class-shown",
        breakpoints: {
            1024: {
                destroy: true
            }
        }
    });
});
