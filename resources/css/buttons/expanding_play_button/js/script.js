var button = document.querySelector("button");
var line = document.getElementById("line");
var icons = document.querySelectorAll(".icon");
var bar = document.getElementById("bar");
var line = document.getElementById("line");
var dot = document.getElementById("dot");
var shown = false;

button.addEventListener("click", async function (e) {
    if (shown === false) {
        shown = true;
        bar.style.animation = "bar 1s ease";
        line.style.animation = "line 1s ease";
        dot.style.animation = "dot 1s ease";
        icons.forEach((icon) => {
            icon.classList.remove("hidden");
            icon.style.animation = "icons 1s";
        });
        line.classList.remove("hidden");
    } else {
        shown = false;
        elementAnimationsBack();
    }
});

function elementAnimationsBack() {
    return new Promise((resolve, reject) => {
        bar.style.animation = "barback 1s ease";
        line.style.animation = "lineback 1s ease";
        dot.style.animation = "dotback 1s ease";
        icons.forEach((icon) => {
            icon.style.animation = "iconsback 1s ease";
        });
        line.addEventListener("animationend", () => {
            if (shown === false) {
                line.classList.add("hidden");
                resolve();
            }
        });
        icons.forEach((icon) => {
            icon.addEventListener("animationend", () => {
                if (shown === false) {
                    icon.classList.add("hidden");
                    resolve();
                }
            });
        });
    });
}
