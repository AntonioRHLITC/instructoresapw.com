const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');
let listElements = document.querySelectorAll('.lateral_list__button--click');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 50) {
		header.style.backgroundColor = '#1f1e1e';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

listElements.forEach(listElement => {
	listElement.addEventListener('click', ()=>{
		
		listElement.classList.toggle('arrow');

		let height = 0;
		let menu = listElement.nextElementSibling;
		if(menu.clientHeight == "0"){
			height=menu.scrollHeight;
		}

		menu.style.height = `${height}px`;

	})
});


var item = document.getElementsByClassName('item');

for (let i = 0; i < item.length; i++) {
  item[i].addEventListener('click', function(el) {
    
    el.currentTarget.classList.toggle('item--open');
    
    for (let i = 0; i < item.length; i++) {
      if (item[i] !== el.currentTarget && item[i].className === "item item--open") {
        item[i].classList.remove('item--open');
      }
    }
  });
};




menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});



$('.carousel').carousel({
	interval: 5000
  })



function toggleslidebar(){
  document.getElementById("slidebar").classList.toggle('active');
}





