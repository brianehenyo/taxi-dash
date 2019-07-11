var INTERVAL = 10;
var x = 0;
var animating = true;
var timer;
function move() {
  aTaxi = document.getElementById("taxi");
  x = x + 1;
  aTaxi.style.left = x + "px";
  if (x > screen.availWidth) {
    x = 0;
  }
  timer = setTimeout("move()", INTERVAL);
}
