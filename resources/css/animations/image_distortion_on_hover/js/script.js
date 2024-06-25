const imgEl = document.getElementsByTagName("img")[0];
const noiseFe = document.getElementsByTagName("feTurbulence")[0];
const distortFes = document.getElementsByTagName("feDisplacementMap");
var isImageHovered = false;
var distortionScale = 0;
imgEl.onmouseenter = () => {
	if (distortionScale < 20) {
		noiseFe.setAttribute("seed", noiseFe.getAttribute("seed") - -1);
	}
	isImageHovered = true;
};
const smoothness = 5;
const accumulation = 1.5;
const idleScale = 50;
console.log(distortFes);
imgEl.onmousemove = (e) => {
	imgEl.classList.add("distort");
	let newScale =
		(smoothness * (distortionScale - isImageHovered * idleScale) +
			accumulation * Math.sqrt(e.movementX ** 2 + e.movementY ** 2)) /
			(smoothness + 1) +
		isImageHovered * idleScale;
	distortFes[0].setAttribute("scale", newScale * 0.8);
	distortFes[1].setAttribute("scale", newScale);
	distortFes[2].setAttribute("scale", newScale * 1.2);
	distortionScale = newScale;
};
setInterval(() => {
	if (distortionScale > 1) {
		imgEl.onmousemove({ movementX: 0, movementY: 0 });
	} else {
		imgEl.classList.remove("distort");
	}
}, 50);
imgEl.onmouseleave = () => {
	isImageHovered = false;
};
