document.addEventListener("DOMContentLoaded", () => {
    const arrows = document.querySelectorAll('a');
    const gallery = document.querySelector('.gallery');
    const images = Array.from(gallery.querySelectorAll('img'));

    // Function to duplicate images at the beginning and end
    function duplicateImages() {
        images.forEach(img => {
            const cloneStart = img.cloneNode(true);
            const cloneEnd = img.cloneNode(true);
            gallery.insertBefore(cloneStart, gallery.firstChild);
            gallery.appendChild(cloneEnd);
        });
    }

    // Initialize images
    duplicateImages();

    let scrollInterval;
    const scrollSpeed = 20;

    // Function to start scrolling
    function startScrolling(direction) {
        stopScrolling(); // Clear any existing intervals
        scrollInterval = setInterval(() => {
            const lastOriginalImage = images[images.length - 1];
            const lastDuplicateImage = gallery.lastChild;

            gallery.scrollLeft += direction * scrollSpeed;

            // Check if the gallery has reached the end
            if (gallery.scrollLeft >= lastOriginalImage.offsetLeft - gallery.clientWidth + lastOriginalImage.clientWidth) {
                // Reached the end, duplicate images at the beginning in the correct order
                const clonedImages = images.map(img => img.cloneNode(true));
                clonedImages.reverse().forEach(clonedImg => {
                    gallery.insertBefore(clonedImg, gallery.firstChild);
                });
                gallery.scrollLeft = lastDuplicateImage.offsetLeft - gallery.clientWidth + lastDuplicateImage.clientWidth;
            }
        }, 30);
    }

    // Function to stop scrolling
    function stopScrolling() {
        clearInterval(scrollInterval);

        // Remove duplicated images
        const children = Array.from(gallery.children);
        children.forEach(child => {
            if (!images.includes(child)) {
                gallery.removeChild(child);
            }
        });
    }

    // Event listeners for hover
    arrows[0].addEventListener('mouseenter', () => startScrolling(-1));
    arrows[0].addEventListener('mouseleave', stopScrolling);
    arrows[1].addEventListener('mouseenter', () => startScrolling(1));
    arrows[1].addEventListener('mouseleave', stopScrolling);

    // Event listeners for hold
    arrows[0].addEventListener('mousedown', () => startScrolling(-1));
    arrows[0].addEventListener('mouseup', stopScrolling);
    arrows[0].addEventListener('mouseleave', stopScrolling);
    arrows[1].addEventListener('mousedown', () => startScrolling(1));
    arrows[1].addEventListener('mouseup', stopScrolling);
    arrows[1].addEventListener('mouseleave', stopScrolling);

    // Event listener to enlarge image on click
    gallery.addEventListener('click', (event) => {
        if (event.target.tagName === 'IMG') {
            enlargeImage(event.target);
        }
    });

    // Function to enlarge image
    function enlargeImage(img) {
        const overlay = document.createElement('div');
        overlay.id = 'overlay';
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        overlay.style.display = 'flex';
        overlay.style.alignItems = 'center';
        overlay.style.justifyContent = 'center';
        overlay.style.zIndex = '1000';
        overlay.style.opacity = '0';
        overlay.style.transition = 'opacity 0.5s ease-in-out'; // Fade-in transition

        const enlargedImg = img.cloneNode();
        enlargedImg.style.width = '400px';
        enlargedImg.style.height = '300px';
        enlargedImg.style.objectFit = 'contain';
        enlargedImg.style.transition = 'transform 0.5s ease-in-out'; // Add transition for smooth effect

        overlay.appendChild(enlargedImg);

        const closeButton = document.createElement('button');
        closeButton.textContent = 'close';
        closeButton.style.position = 'absolute';
        closeButton.style.top = '20px';
        closeButton.style.right = '20px';
        closeButton.style.padding = '10px 20px';
        closeButton.style.fontSize = '18px';
        closeButton.style.color = '#fff';
        closeButton.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
        closeButton.style.border = 'none';
        closeButton.style.cursor = 'pointer';
        closeButton.style.borderRadius = '5px';
        overlay.appendChild(closeButton);

        document.body.appendChild(overlay);

        setTimeout(() => {
            overlay.style.opacity = '1'; // Start fade-in effect
        }, 10);

        // Enlarge image on click
        enlargedImg.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent overlay close on image click
        });

        closeButton.addEventListener('click', () => {
            overlay.style.opacity = '0'; // Start fade-out effect
            setTimeout(() => {
                document.body.removeChild(overlay);
            }, 500);
        });

        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                overlay.style.opacity = '0'; // Start fade-out effect
                setTimeout(() => {
                    document.body.removeChild(overlay);
                }, 500);
            }
        });
    }
});