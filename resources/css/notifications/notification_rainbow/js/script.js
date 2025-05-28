const notificationCount = document.querySelector(".notification-count");
const notificationBell = document.querySelector(".notification-bell");
let count = 0;

const random = (min, max) => min + Math.random() * (max - min);

function newNotification() {
    count++;

    notificationBell.classList.add("animate");
    setTimeout(() => notificationBell.classList.remove("animate"), 1500);
    setTimeout(newNotification, random(1500, 2700));

    if (count === 1) {
        notificationCount.style.visibility = "visible";
    }

    if (count > 9) {
        notificationCount.textContent = "9+";
        return;
    }

    notificationCount.textContent = count;
}

setTimeout(newNotification, 1200);