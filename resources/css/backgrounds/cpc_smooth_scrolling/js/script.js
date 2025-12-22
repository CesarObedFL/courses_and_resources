gsap.registerPlugin(Observer)
gsap.registerPlugin(TextPlugin
)
let animateFlag = false;
let textAnimateFlag = false;
let lazyCount = 0;
const textPrompts = ["#CodePenChallenge", "#SmoothScrolling", "#Gsap-Observer"]



document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("container");
    const image1 = document.getElementById("one");
    const image2 = document.getElementById("two");
    const image3 = document.getElementById("three");
    const satellite = document.getElementById("satellite");

    const image1bounds = image1.getBoundingClientRect();
    const image2bounds = image2.getBoundingClientRect();
    const image3bounds = image2.getBoundingClientRect();
    let satelliteBounds = satellite.getBoundingClientRect();
    let scrollValue = window.pageYOffset - satelliteBounds.width;
    let satelliteSetterX = gsap.quickSetter(satellite, "x", "px")
    let satelliteSetterY = gsap.quickSetter(satellite, "Y", "px")

    satelliteSetterX(-satelliteBounds.width)
    satelliteSetterY(Math.abs(scrollValue - (window.innerWidth / 2)) / 10)

    let panels = [image1, image2, image3];
    function idle() {
        satelliteBounds = satellite.getBoundingClientRect();
        gsap.timeline({ repeat: -1, yoyo: true, defaults: { duration: 3, ease: "power4.inOut", overwrite: true } })
            .to(satellite, { x: `+=${Math.random() * 40 - 20}`, y: `+=${Math.random() * 40 - 20}` }, "-=1")
            .to(satellite, { x: `+=${Math.random() * 40 - 20}`, y: `+=${Math.random() * 40 - 20}` }, "-=1")
            .to(satellite, { x: `+=${Math.random() * 40 - 20}`, y: `+=${Math.random() * 40 - 20}` }, "-=1")
            .to(satellite, { x: `+=${Math.random() * 40 - 20}`, y: `+=${Math.random() * 40 - 20}` }, "-=1")
            .to(satellite, { x: `+=${Math.random() * 40 - 20}`, y: `+=${Math.random() * 40 - 20}` }, "-=1");
    }


    function check(event) {
        if (!animateFlag) {
            scrollValue += event.deltaY
            animate()
        }
    }


    function animate() {
        if (scrollValue < -satelliteBounds.width * 2) {
            animateFlag = true;
            scrollValue = window.innerWidth + satelliteBounds.width;
            panels[panels.length - 2].style.zIndex = "0"
            panels[0].style.zIndex = "2"
            panels.splice(0, 0, panels.pop());
            panels[0].style.zIndex = '10';
            gsap.fromTo(panels[0], { y: -window.innerHeight * 2 }, {
                y: 0, duration: 2, ease: "power4.out", onComplete: () => {
                    satelliteSetterX(window.innerWidth + satelliteBounds.width)
                    satelliteSetterY(Math.abs(scrollValue - (window.innerWidth / 2)) / 10)
                    animateFlag = false;
                }
            })
            gsap.fromTo(panels[0].children, { opacity: 0 }, { opacity: 1, ease: "power4.inout", duration: 4 })
            return

        }

        if (scrollValue > window.innerWidth + satelliteBounds.width) {
            animateFlag = true
            scrollValue = -satelliteBounds.width;
            panels[panels.length - 1].style.zIndex = "0";
            panels[0].style.zIndex = '2';
            panels.push(panels.shift())
            panels[0].style.zIndex = '10';
            gsap.fromTo(panels[0], { y: window.innerHeight * 2 }, {
                y: 0, duration: 2, ease: "power4.out", onComplete: () => {
                    satelliteSetterX(-satelliteBounds.width)
                    satelliteSetterY(Math.abs(scrollValue - (window.innerWidth / 2)) / 10)
                    animateFlag = false;
                }
            })
            gsap.fromTo(panels[0].children, { opacity: 0 }, { opacity: 1, ease: "power4.inout", duration: 4 })
            return
        }
        gsap.to(satellite, {
            x: scrollValue, y: Math.abs(scrollValue - (window.innerWidth / 2)) / 10, duration: 1, overwrite: true, ease: "power4.out", onComplete: () => {
                if (animateFlag) {
                    if (scrollValue === -satelliteBounds.width) {
                        satelliteSetterX(-satelliteBounds.width)
                        satelliteSetterY(Math.abs(scrollValue - (window.innerWidth / 2)) / 10)
                    } else {
                        satelliteSetterX(window.innerWidth + satelliteBounds.width)
                        satelliteSetterY(Math.abs(scrollValue - (window.innerWidth / 2)) / 10)
                    }
                } else {
                    idle()
                }
            }
        })
        if (!panels[0].children[1].textContent) {
            if (scrollValue > window.innerWidth / 4 && scrollValue < window.innerWidth * 0.75 && !textAnimateFlag) {
                textAnimateFlag = true;
                gsap.to(panels[0].children[1], {
                    duration: 1, text: {
                        value: textPrompts[lazyCount],
                        speed: 1,
                    }, onComplete: () => {
                        textAnimateFlag = false;
                    }
                })
                lazyCount++
            }
        }
    }

    let backgroundY = 100 / window.innerHeight
    let backgroundX = 100 / window.innerWidth

    document.addEventListener("mousemove", (e) => {
        if (!animateFlag) {
            panels.forEach(panel => {
                gsap.to(panel, {
                    backgroundPosition: `${((backgroundX * e.clientX) / 10) + 50}% ${((backgroundY * e.clientY) / 10) + 50}%`,
                    overwrite: true,
                    ease: "power4.out",
                    duration: 0.5
                })
            })
        }
    });

    Observer.create({
        target: window,
        type: "wheel,touch",
        onUp: (self) => check(self),
        onDown: (self) => check(self),
    });
})

