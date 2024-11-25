const list = document.querySelectorAll('nav ul li');
const menuToggle = document.querySelector('.toggle');
const nav = document.querySelector('nav');
const pageMask = document.querySelector('#page-mask')
const body = document.body;

menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('active');
    nav.classList.toggle('active');
    if (!nav.classList.contains('active')) {
        body.classList.add('nav-active');
        pageMask.style.display = 'block';
    }
    else {
        body.classList.remove('nav-active');
    }
})

for (let item of list) {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        let j = 0;
        for (let listItem of list) {
            listItem.classList.remove('active');
        }
        this.classList.add('active');
    })
}