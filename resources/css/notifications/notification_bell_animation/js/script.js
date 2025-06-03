const buttonElement = document.querySelector(".notification-bell");
const countElement = document.getElementById("count");
const firstNotificationElement = document.getElementById("first");
const secondNotificationElement = document.getElementById("second");
const thirdNotificationElement = document.getElementById("third");

let count = 3;

setInterval(function () {
    count += 1;
    countElement.innerText = count;
}, 2000);

for (let i = 0; i < 11; i++) {
    firstNotificationElement.classList.add("notify-first");
    secondNotificationElement.classList.add("notify-second");
    thirdNotificationElement.classList.add("notify-third");
}
