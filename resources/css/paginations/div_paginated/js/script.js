document.addEventListener("DOMContentLoaded", function () {
    const pages = document.querySelectorAll(".page");
    const prevButton = document.getElementById("prevPage");
    const nextButton = document.getElementById("nextPage");
    const one = document.getElementById("page1");
    const two = document.getElementById("page2");
    const three = document.getElementById("page3");
    const four = document.getElementById("page4");
    const five = document.getElementById("page5");

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
        prevButton.disabled = currentPage === 0;
        nextButton.disabled = currentPage === pages.length - 1;
        one.disabled = currentPage === 0;
        two.disabled = currentPage === 1;
        three.disabled = currentPage === 2;
        four.disabled = currentPage === 3;
        five.disabled = currentPage === 4;
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

    one.addEventListener("click", function () {
        if (currentPage != 0) {
            currentPage = 0;
            showPage(currentPage);
            updateButtons();
        }
    });

    two.addEventListener("click", function () {
        if (currentPage != 1) {
            currentPage = 1;
            showPage(currentPage);
            updateButtons();
        }
    });

    three.addEventListener("click", function () {
        if (currentPage != 2) {
            currentPage = 2;
            showPage(currentPage);
            updateButtons();
        }
    });

    four.addEventListener("click", function () {
        if (currentPage != 3) {
            currentPage = 3;
            showPage(currentPage);
            updateButtons();
        }
    });

    five.addEventListener("click", function () {
        if (currentPage != 4) {
            currentPage = 4;
            showPage(currentPage);
            updateButtons();
        }
    });

    showPage(currentPage);
    updateButtons();
});
