

const navbar = document.querySelector('nav.navbar')
const button = document.querySelector('div.menu-icon')
const closeButton = document.querySelector('div.menu-icon').children[0]


button.addEventListener('click', () =>{
	navbar.classList.toggle('active')
	closeButton.classList.toggle('fa-bars')
	closeButton.classList.toggle('fa-times')
})



// Get the modal
var modal = document.getElementById("log");
var modal = document.getElementById("cad");

// Get the button that opens the modal
var btn = document.getElementById("loguin");
var btn = document.getElementById("cadastro");

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
  // modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

