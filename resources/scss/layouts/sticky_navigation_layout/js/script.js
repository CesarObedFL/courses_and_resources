/*
You can find me here:
- https://linkedin.com/in/moxsim

All these pix generated by me in origami style using AI:
- https://beta.dreamstudio.ai/generate

Made for Codepen Challenge
- https://codepen.io/tag/cpc-sticky-nav/
*/

const indicator = document.querySelector(".indicator")
addEventListener("scroll", function () {
    const scrollHeight = document.body.scrollHeight;
    const innerHeight = window.innerHeight;
    const innerWidth = window.innerWidth;
    const left = (scrollY / scrollHeight) * innerWidth;
    indicator.style.transform = `translateX(${left}px)`
})