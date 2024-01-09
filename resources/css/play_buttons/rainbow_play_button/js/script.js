var pause = true;

var icon = document.getElementById('icon');

document.getElementById('button').addEventListener('click', function () {
    
    if (pause == true) {
        $('head').append("<style>.gradient-border::after{ animation-duration: 1.4s }</style>");
        icon.style.transform = 'rotate(0deg)';
        icon.style.borderLeft = '6px solid white';
        icon.style.borderBottom = '6px solid #2c2f30';
        document.getElementById('music').play();
        pause = false;
    }
    else {
        $('head').append("<style>.gradient-border::after{ animation-duration: 3s }</style>");
        icon.style.transform = 'rotate(-45deg)';
        icon.style.borderLeft = '6px solid #2c2f30';
        icon.style.borderBottom = '6px solid white';
        document.getElementById('music').pause();
        pause = true;
    }
});