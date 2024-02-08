document.addEventListener('DOMContentLoaded', function () {
    // Toggle Switch
    const container = document.querySelector('.container')
    const toggleSwitch = document.querySelector('.switch')

    toggleSwitch.addEventListener('click', () => {
        container.classList.toggle('dark-theme')
    })

    const aside = document.querySelector('aside')
    const toggleMenu = document.querySelector('.toggle-menu')

    toggleMenu.addEventListener('click', () => {
        aside.classList.toggle('active')
        toggleMenu.classList.toggle('active')
    })


    // Dropdown Menu
    const mainMenus = document.querySelectorAll('.main-menu')

    mainMenus.forEach((mainMenu) => {
        const subMenu = mainMenu.nextElementSibling

        if (subMenu) {
            mainMenu.addEventListener('click', () => {
                mainMenu.classList.toggle('active')
                subMenu.classList.toggle('active')
            })
        }
    })

})
