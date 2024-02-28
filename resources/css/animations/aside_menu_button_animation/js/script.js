document.addEventListener('click', function (e) {
    var target = e.target;
    if (target.getAttribute('data-click-play') && !+target.getAttribute('data-transition-play')) {

        target.classList.toggle('__clicked');
        target.setAttribute('data-transition-play', 1);
        transitionPlay(e);
    }
});

function transitionPlay(e) {
    var target = e.target;
    if (target.getAttribute('data-click-play')) {
        var list = target.getAttribute('data-click-play').split(',');
        var len = list.length;
        if (!target.classList.contains('__clicked')) {
            for (var i = len; i--;) {
                if (target.classList.contains(list[i])) {
                    target.classList.remove(list[i]);
                    break;
                }
            }
            if (i === 0) {
                target.setAttribute('data-transition-play', 0);
            }
        } else {
            for (var i = 0; i < len; i++) {
                if (!target.classList.contains(list[i])) {
                    target.classList.add(list[i]);
                    break;
                }
            }
            //
            if (i === len) {
                target.setAttribute('data-transition-play', 0);
            }
        }


        //target.classList.toggle('__clicked');
    }
}

document.addEventListener('transitionend', transitionPlay);
  /*
var h = document.querySelector('#h');
h.addEventListener('transitionend', function (e) {
  //console.log(e);
  if (this.classList.contains('__clicked')) {
    if (!this.classList.contains('__active')) {
      this.classList.add('__active');
    }
  } else {
    this.classList.remove('__hover');
  }
});
h.addEventListener('click', function () {
  this.classList.toggle('__clicked');
  if (!this.classList.contains('__active')) {
    this.classList.add('__hover');
  } else {
    this.classList.remove('__active');
    
  }
});
*/