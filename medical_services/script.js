let menubar = document.querySelector('#menubar');
let mynav = document.querySelector('.navbar');

menubar.onclick = () => {
	menubar.classlist.toggle('fa-times')
	mynav.classlist.toggle('active')
}

