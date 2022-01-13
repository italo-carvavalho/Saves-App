
var m = document.getElementById("log");

var t = document.getElementById("login");

var span = document.getElementsByClassName("logclose")[0];
 
t.onclick = function() {
  m.style.display = "block";
}
span.onclick = function() {
  m.style.display = "none";
}

// window.onclick = function(event) {
//   if (event.target == modal) {
//     m.style.display = "none";
//   }
// }