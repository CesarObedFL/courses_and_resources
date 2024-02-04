gsap.registerPlugin(DrawSVGPlugin, ScrambleTextPlugin);

const btn = document.querySelector("button");
const btnContainer = document.querySelector(".button-container");
const reticule = document.querySelectorAll("#reticule");
const reticuleRect = document.querySelector("#reticule rect");
const playIcon = document.querySelector("#playIcon");
const block2 = document.querySelector("#block-2");
const stats = document.querySelector(".stats");
const statsPercent = document.querySelector(".stats-percent");
let isClicked = false;
let reticuleFlicker;


gsap.set(reticuleRect, { drawSVG: "50% 50%" });
gsap.set(reticule, { opacity: 0 });
gsap.set(stats, {
    clipPath: "polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)"
});

// RETICULE FLICKER
reticuleFlicker = gsap.to(reticule, 0.05, {
    opacity: 0.5,
    yoyo: true,
    repeat: -1
});
reticuleFlicker.pause();

// MOUSEOVER
btn.addEventListener("mouseover", () => {
    if (isClicked) {
        reticuleFlicker.pause();
        gsap.to(playIcon, 0, { scale: 0.8 });
    } else {
        reticuleFlicker.play();
        gsap.to(playIcon, 0, { scale: 0.8 });
    }
});

// MOUSEOUT
btn.addEventListener("mouseout", () => {
    reticuleFlicker.pause();
    if (isClicked) {
        gsap.set(reticule, { opacity: 1 });
        gsap.set(playIcon, { scale: 0.8 });
    } else {
        gsap.set(reticule, { opacity: 0 });
        gsap.set(playIcon, { scale: 1 });
    }
});

// CLICKED
btn.addEventListener("click", () => {
    isClicked = true;
    btn.style['pointer-events'] = "none";
    gsap.set(reticule, { opacity: 1 });
    gsap.set(playIcon, { scale: 0.8 });
    gsap.to(reticuleRect, 0.5, {
        drawSVG: "100%",
        ease: "back.out",
        onComplete: () => showStats()
    });
    reticuleFlicker.pause();
});

// EXPANDING BLOCK LINE
gsap.to(block2, 5, {
    keyframes: { drawSVG: [20, 40, 30, 60, 15, 50, 20] },
    repeat: -1,
    ease: "sine.inOut"
});

function showStats() {
    let tl = gsap.timeline();
    let count = { val: 0 };
    let newVal = 100;

    gsap.to(stats, 0.7, {
        clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
        ease: "back.out",
        onComplete: () => {
            gsap.to(count, 5, {
                val: newVal,
                roundProps: "val",
                onUpdate: () => {
                    document.querySelector(".stats-percent").innerHTML = count.val;
                },
                onComplete: () => {
                    tl
                        .to(stats, 0.7, {
                            clipPath: "polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)",
                            ease: "back.out"
                        })
                        .to(reticuleRect, 0.5, {
                            drawSVG: "50% 50%",
                            ease: "back.out"
                        })
                        .to(reticule, 0.3, {
                            opacity: 0,
                            onComplete: () => {
                                isClicked = false;
                                btn.style['pointer-events'] = "auto";
                                gsap.to(playIcon, 0.2, { scale: 1 });
                            }
                        }, "-=0.2");
                }
            });
        }
    });
}
