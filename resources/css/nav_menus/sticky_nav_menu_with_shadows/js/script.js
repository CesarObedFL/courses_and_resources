document.addEventListener("DOMContentLoaded", () => {

    let activate = document.querySelectorAll('nav a');


    function activateLink() {
        let active = document.querySelector('.active');
        active.classList.remove('active');
        this.classList.add('active');
    };

    activate.forEach((item) =>
        item.addEventListener('click', activateLink)
    );

});