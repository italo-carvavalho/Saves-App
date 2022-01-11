
var m = document.getElementById("log");

var t = document.getElementById("loguin");

var span = document.getElementsByClassName("fecharr")[0];
 
t.onclick = function() {
  m.style.display = "block";
}
span.onclick = function() {
  m.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == m) {
    m.style.display = "none";
  }
}