
var modal = document.getElementById("cad","log"); // Get the modal
// var m = document.getElementById("log");

var btn = document.getElementById("cadastro", "loguin"); // Get the button that opens the modal


var span = document.getElementsByClassName("cadclose", "logclose")[0]; // Get the <span> element that closes the modal

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
 // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modl) {
//     modl.style.display = "none";
//   }
// }