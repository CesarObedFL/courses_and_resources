window.addEventListener("scroll", doPinnedCheck);

function doPinnedCheck() {
    const stations = document.querySelectorAll(".line .station");

    const pinnedStations = [...stations].filter((station) => {
        return station.getBoundingClientRect().top <= 193;
    }).slice(1);

    if (!pinnedStations) {
        return;
    }

    document.documentElement.style.setProperty(
        "--tfl-station-index",
        pinnedStations.length
    );
}