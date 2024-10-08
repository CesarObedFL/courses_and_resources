document.addEventListener("DOMContentLoaded", function () {
    const pages = document.querySelectorAll(".moviecontainer");
    const prevButton = document.getElementById("prevPage");
    const nextButton = document.getElementById("nextPage");
    let currentPage = 0;

    function showPage(pageNumber) {
        pages.forEach((page, index) => {
            if (index === pageNumber) {
                page.style.display = "flex";
            } else {
                page.style.display = "none";
            }
        });
    }

    function updateButtons() {
        prevButton.disabled = currentPage === 0;
        nextButton.disabled = currentPage === pages.length - 1;
    }

    prevButton.addEventListener("click", function () {
        if (currentPage > 0) {
            currentPage--;
            showPage(currentPage);
            updateButtons();
        }
    });

    nextButton.addEventListener("click", function () {
        if (currentPage < pages.length - 1) {
            currentPage++;
            showPage(currentPage);
            updateButtons();
        }
    });

    showPage(currentPage);
    updateButtons();
});
function showSeptemberFool() {
    alert("SEPTEMBER'S FOOL!");
}