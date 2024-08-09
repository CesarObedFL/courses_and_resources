const navEl = document.querySelectorAll(".nav");
const sectionEl = document.querySelectorAll("header, section");
let currentSelection = "";

window.onscroll = () => {
    sectionEl.forEach((sec) => {
        const sectionTop = sec.offsetTop;
        const sectionHeight = sec.offsetHeight;
        if (window.pageYOffset >= sectionTop - sectionHeight / 3) {
            currentSelection = sec.getAttribute("id");
        }
    });
    navEl.forEach((nav) => {
        if (nav.href.includes(currentSelection)) {
            nav.classList.add("active");
        } else {
            nav.classList.remove("active");
        }
    });
};

navEl.forEach((nav) => {
    let spanGrow = document.createElement("span");
    let spanFlick = document.createElement("span");
    spanGrow.className = "grow";
    spanFlick.className = "flick";
    nav.appendChild(spanGrow);
    nav.appendChild(spanFlick);
});
