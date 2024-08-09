const body = document.querySelector("body");
const PlayBtn = document.querySelector(".playBtn");
const playIcon = document.querySelector(".fa-play");
const play = document.querySelector(".play");
const pause = document.querySelector(".pause");
const pauseIcon = document.querySelector(".fa-pause");
const audio = document.querySelector("audio");
const darkBtn = document.getElementById("darkBtn");
const darkTxt = darkBtn.querySelector("span");
const sun = darkBtn.querySelector(".fa-sun");
const moon = darkBtn.querySelector(".fa-moon");
const title = document.querySelector("h1");

sun.style.display = "none";
let playPressed = false;
let darkTriggered = false;

playIcon.style.color = "white";

darkBtn.addEventListener("click", () => {
    body.classList.toggle("darkMode");

    if (body.classList.contains("darkMode")) {
        title.style.color = "white";
        moon.style.display = "none";
        sun.style.display = "inline";
        darkTxt.innerText = "Light Mode";
    } else {
        title.style.color = "black";
        moon.style.display = "inline";
        sun.style.display = "none";
        darkTxt.innerText = "Dark Mode";
    }
});

PlayBtn.addEventListener("click", () => {
    if (!playPressed) {
        audio.play();
        play.style.display = "none";

        pause.style.display = "inline";
        playPressed = true;
    } else {
        audio.pause();
        play.style.display = "inline";
        pause.style.display = "none";
        playPressed = false;
    }

    if (playPressed) {
        pauseIcon.classList.add("pauseAnimate");
    }
});
