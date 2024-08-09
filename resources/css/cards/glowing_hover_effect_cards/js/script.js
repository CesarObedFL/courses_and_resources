document.body.onmousemove = e => {
    document.body.style.setProperty("--mouse-x", e.clientX);
    document.body.style.setProperty("--mouse-y", e.clientY);
};
