// Class slider 
class Slider {
	// TODO: objet slider settings
	constructor(settings) {
	  this.default = {
		"sliderContainer": document.querySelector('.blog-slider__container'),
		"autoPlay": true,
		"speed": 3000,
		"arrows" : true,
		"dots": true,
		"prev": document.querySelector('.prev'),
		"next": document.querySelector('.next'),
		"appendDots": document.querySelector('.blogSlider__dots')
	  };
	  
	  this.settings = {
		...this.default,
		...settings,
		defaultSlide: 1
	  } 
	  
	  this.slideIndex = this.settings.defaultSlide;
	  this.stockInterval = null
	   
	};
	
	init() {
	  if(!this.settings.dots) {
		 this.settings.appendDots.style.display = "none";
	  }
	  
	  this.showSlides(this.slideIndex);
	  this.handlers();
	  this.slideAuto();
	}
	
	handlers() {
	  
	  // if dots equal true
	  if(this.settings.dots) {
		
		this.settings.appendDots.querySelectorAll('.blogSlider__dots--dot').forEach((dot, index) => {
		   dot.addEventListener("click", () => this.dots(index + 1));
		});
		
	  }
	  
	  //prev / next buttons
	  this.settings.next.addEventListener("click", () => this.arrowsControl(1));
	  this.settings.prev.addEventListener("click", () => this.arrowsControl(-1));
	  
	}
	
	
	showSlides(slideNumber) {
  
	   let slides = this.settings.sliderContainer.querySelectorAll('.blogSlides');
	   let dots = this.settings.appendDots.children;
		  
	  if (slideNumber > slides.length) {
	   this.slideIndex = 1
	  }else if (slideNumber < 1) {
		this.slideIndex = slides.length
	  } else {
		this.slideIndex = slideNumber;
	  }
	  
	  for (let i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	  }
	  
	  for (let i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	  }
	  
	  slides[this.slideIndex - 1].style.display = "block";
	  dots[this.slideIndex - 1].className += " active";
	}
	
	dots(index) {
	  this.showSlides(index);
	  this.resetInterval();
	}
	
	arrowsControl(n) {
	  this.slideIndex += n;
	  this.showSlides(this.slideIndex);
	  
	  this.resetInterval();
	}
	
	slideAuto() {
	  
	  if(this.settings.autoPlay) {
		
		this.stockInterval = setInterval(() => { 
			this.showSlides(this.slideIndex += 1)
		  }, this.settings.speed);
		}
	  
	  }
	
	resetInterval() {
	  if(this.stockInterval != null) {
		clearInterval(this.stockInterval);
		this.slideAuto();
	  }
	}
  }
  
  // Settings 
  //{
  //  "sliderContainer": document.querySelector('.blog-slider__container'),
  //   "autoPlay": true,
  //   "speed": 3000,
  //   "arrows" : true,
  //   "dots": true,
  //   "prev": document.querySelector('.prev'),
  //   "next": document.querySelector('.next'),
  //   "dotsHtml": document.querySelector('.blogSlider__dots')
  //}
  
  // instance de Slider;
  let slider = new Slider({
	"autoPlay": true,
	"speed": 5000
  });
  
  slider.init();