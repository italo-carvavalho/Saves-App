

const navbar = document.querySelector('nav.navbar')
const button = document.querySelector('div.menu-icon')
const closeButton = document.querySelector('div.menu-icon').children[0]


button.addEventListener('click', () =>{
	navbar.classList.toggle('active')
	closeButton.classList.toggle('fa-bars')
	closeButton.classList.toggle('fa-times')
})


