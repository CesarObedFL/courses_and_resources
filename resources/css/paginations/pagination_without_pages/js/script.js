document.addEventListener("DOMContentLoaded", function () {
    const pages = document.querySelectorAll(".page");
    const prevButton = document.getElementById("prevPage");
    const nextButton = document.getElementById("nextPage");

    const firstButton = document.getElementById("firstPage");
    const lastButton = document.getElementById("lastPage");
    let currentPage = 0;

    function showPage(pageNumber) {
        pages.forEach((page, index) => {
            if (index === pageNumber) {
                page.style.display = "block";
            } else {
                page.style.display = "none";
            }
        });
    }

    function updateButtons() {
        firstButton.disabled = currentPage === 0;
        prevButton.disabled = currentPage === 0;
        nextButton.disabled = currentPage === pages.length - 1;
        lastButton.disabled = currentPage === pages.length - 1;
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

    firstButton.addEventListener("click", function () {
        if (currentPage > 0) {
            currentPage = 0;
            showPage(currentPage);
            updateButtons();
        }
    });


    lastButton.addEventListener("click", function () {
        if (currentPage < pages.length - 1) {
            currentPage = pages.length - 1;
            showPage(currentPage);
            updateButtons();
        }
    });

    showPage(currentPage);
    updateButtons();
});
