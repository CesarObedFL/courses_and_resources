document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.timeline_container') != null) {
        const timelineContainer = document.querySelector('.timeline_container');
        const events = document.querySelectorAll('.timeline_event');
        const eventContainer = document.querySelector('.timeline_event_container');
        let currentIndex = 0;

        function createPlaceholder() {
            const placeholder = document.createElement('div');
            placeholder.classList.add('timeline_event', 'timeline_placeholder');
            placeholder.style.visibility = 'hidden'; // The placeholder should be invisible
            return placeholder;
        }

        function updateDisplay() {
            events.forEach((event, index) => {
                event.style.transform = 'scale(0.8)'; // Smaller scale for non-focused
                event.style.zIndex = '0'; // Reset z-index
                event.classList.remove('timeline_focus');
            });

            let startIdx = Math.max(currentIndex - 1, 0);
            let endIdx = Math.min(currentIndex + 1, events.length - 1);

            events.forEach((event, index) => {
                if (index === currentIndex) {
                    event.style.transform = 'scale(1.2)'; // Larger scale for focused event
                    event.style.zIndex = '1';
                    event.classList.add('timeline_focus');
                }
            });

            // Scroll to center the focused event
            let focusedEvent = events[currentIndex];
            let scrollTarget = focusedEvent.offsetLeft - (eventContainer.offsetWidth / 2) + (focusedEvent.offsetWidth / 2);
            eventContainer.scrollTo({
                left: scrollTarget,
                behavior: 'smooth'
            });
        }
        const prevButton = document.querySelector('.left_arrow');
        const nextButton = document.querySelector('.right_arrow');

        prevButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentIndex > 0) {
                currentIndex--;
                updateDisplay();
            }
        });

        prevButton.addEventListener('touchstart', function (e) {
            e.preventDefault();
            if (currentIndex > 0) {
                currentIndex--;
                updateDisplay();
            }
        });

        nextButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentIndex < events.length - 1) {
                currentIndex++;
                updateDisplay();
            }
        });

        nextButton.addEventListener('touchstart', function (e) {
            e.preventDefault();
            if (currentIndex < events.length - 1) {
                currentIndex++;
                updateDisplay();
            }
        });

        // Initialize the display
        updateDisplay();
    }
});
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.timeline_container') != null) {
        const timelineContainer = document.querySelector('.timeline_container');
        const events = document.querySelectorAll('.timeline_event');
        const eventContainer = document.querySelector('.timeline_event_container');
        let currentIndex = 0;

        function updateDisplay() {
            events.forEach((event, index) => {
                event.style.transform = 'scale(0.8)';
                event.style.zIndex = '0';
                event.classList.remove('timeline_focus');
            });

            let focusedEvent = events[currentIndex];
            focusedEvent.style.transform = 'scale(1.2)';
            focusedEvent.style.zIndex = '1';
            focusedEvent.classList.add('timeline_focus');

            // Scroll to center the focused event
            let scrollTarget = focusedEvent.offsetLeft - (eventContainer.offsetWidth / 2) + (focusedEvent.offsetWidth / 2);
            eventContainer.scrollTo({
                left: scrollTarget,
                behavior: 'smooth'
            });
        }

        // Assign click listeners to each event
        events.forEach((event, index) => {
            event.addEventListener('click', function () {
                currentIndex = index;
                updateDisplay();
            });
        });

        // Arrow navigation
        const prevButton = document.querySelector('.left_arrow');
        const nextButton = document.querySelector('.right_arrow');

        prevButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentIndex > 0) {
                currentIndex--;
                updateDisplay();
            }
        });

        nextButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentIndex < events.length - 1) {
                currentIndex++;
                updateDisplay();
            }
        });

        // Initialize the display
        updateDisplay();
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const events = document.querySelectorAll('.timeline_event');

    events.forEach((event, eventIndex) => {
        const contents = event.querySelectorAll('.timeline_event_content');
        const dotsContainer = event.querySelector('.dots');

        if (contents.length > 1) {
            contents.forEach((content, contentIndex) => {
                const dot = document.createElement('span');
                dot.classList.add('dot');
                dot.dataset.index = contentIndex;
                dotsContainer.appendChild(dot);

                dot.addEventListener('click', function () {
                    showContent(eventIndex, contentIndex);
                });
            });

            function showContent(eventIndex, contentIndex) {
                const eventContents = events[eventIndex].querySelectorAll('.timeline_event_content');
                const eventDots = events[eventIndex].querySelectorAll('.dot');

                eventContents.forEach(content => content.classList.remove('active'));
                eventDots.forEach(dot => dot.classList.remove('active'));

                eventContents[contentIndex].classList.add('active');
                eventDots[contentIndex].classList.add('active');
            }

            // Initialize the first content as active
            showContent(eventIndex, 0);
        } else {
            contents[0].classList.add('active');
        }
    });
});

/*OPTIONNAL*/

function toggleBackground() {
    var body = document.body;
    var switchButton = document.querySelector('.switch');
    if (body.style.backgroundColor === 'rgb(19, 42, 75)') {
        body.style.backgroundColor = '';
        switchButton.classList.remove('active');
    } else {
        body.style.backgroundColor = '#132a4b';
        switchButton.classList.add('active');
    }
}