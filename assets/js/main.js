function slideFromLeft() {
    var elementArray = document.querySelectorAll('.fromLeft');
    for (var i = 0; i < elementArray.length; i++) {
        elementArray[i].classList.toggle('visible');
    }
}
function slideFromRight() {
    var elementArray = document.querySelectorAll('.fromRight');
    for (var i = 0; i < elementArray.length; i++) {
        elementArray[i].classList.toggle('visible');
    }
}
function slideFromTop() {
    var elementArray = document.querySelectorAll('.fromTop');
    for (var i = 0; i < elementArray.length; i++) {
        elementArray[i].classList.toggle('visible');
    }
}
function slideFromBottom() {
    var elementArray = document.querySelectorAll('.fromBottom');
    for (var i = 0; i < elementArray.length; i++) {
        elementArray[i].classList.toggle('visible');
    }
}
function apparaitre() {
    var elementArray = document.querySelectorAll('.apparaitre');
    for (var i = 0; i < elementArray.length; i++) {
        elementArray[i].classList.toggle('visible')
    }
}
function slideAll() {
    slideFromLeft();
    slideFromRight();
    slideFromTop();
    slideFromBottom();
    apparaitre();
}