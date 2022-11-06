
/*script de MENU CATEGORIAS*/
const btnDepartamentos = document.getElementById('btn-departamentos'),
	  btnCerrarMenu = document.getElementById('btn-menu-cerrar'),
	  grid = document.getElementById('grid'),
	  contenedorEnlacesNav = document.querySelector('#menu .contenedor-enlaces-nav'),
	  contenedorSubCategorias = document.querySelector('#grid .contenedor-subcategorias'),
	  esDispositivoMovil = () => window.innerWidth <= 800;

btnDepartamentos.addEventListener('mouseover', () => {
	if(!esDispositivoMovil()){
		grid.classList.add('activo');
	}
});

grid.addEventListener('mouseleave', () => {
	if(!esDispositivoMovil()){
		grid.classList.remove('activo');
	}
});

document.querySelectorAll('#menu .categorias a').forEach((elemento) => {
	elemento.addEventListener('mouseenter', (e) => {
		if(!esDispositivoMovil()){
			document.querySelectorAll('#menu .subcategoria').forEach((categoria) => {
				categoria.classList.remove('activo');
				if(categoria.dataset.categoria == e.target.dataset.categoria){
					categoria.classList.add('activo');
				}
			});
		};
	});
});

// EventListeners para dispositivo movil.
document.querySelector('#btn-menu-barras').addEventListener('click', (e) => {
	e.preventDefault();
	if(contenedorEnlacesNav.classList.contains('activo')){
		contenedorEnlacesNav.classList.remove('activo');
		document.querySelector('body').style.overflow = 'visible';
	} else {
		contenedorEnlacesNav.classList.add('activo');
		document.querySelector('body').style.overflow = 'hidden';
	}
});

// Click en boton de todos los departamentos (Para version movil).
btnDepartamentos.addEventListener('click', (e) => {
	e.preventDefault();
	grid.classList.add('activo');
	btnCerrarMenu.classList.add('activo');
});

// Boton de regresar en el menu de categorias
document.querySelector('#grid .categorias .btn-regresar').addEventListener('click', (e) => {
	e.preventDefault();
	grid.classList.remove('activo');
	btnCerrarMenu.classList.remove('activo');
});

document.querySelectorAll('#menu .categorias a').forEach((elemento) => {
	elemento.addEventListener('click', (e) => {
		if(esDispositivoMovil()){
			contenedorSubCategorias.classList.add('activo');
			document.querySelectorAll('#menu .subcategoria').forEach((categoria) => {
				categoria.classList.remove('activo');
				if(categoria.dataset.categoria == e.target.dataset.categoria){
					categoria.classList.add('activo');
				}
			});
		}
	});
});

// Boton de regresar en el menu de categorias
document.querySelectorAll('#grid .contenedor-subcategorias .btn-regresar').forEach((boton) => {
	boton.addEventListener('click', (e) => {
		e.preventDefault();
		contenedorSubCategorias.classList.remove('activo');
	});
});

btnCerrarMenu.addEventListener('click', (e)=> {
	e.preventDefault();
	document.querySelectorAll('#menu .activo').forEach((elemento) => {
		elemento.classList.remove('activo');
	});
	document.querySelector('body').style.overflow = 'visible';
});
/*script de MENU CATEGORIAS*/



/*script de SLIDER AUTOMATICO*/
$('.slider').each(function() {
    var $this = $(this);
    var $group = $this.find('.slide_group');
    var $slides = $this.find('.slide');
    var bulletArray = [];
    var currentIndex = 0;
    var timeout;
    
    function move(newIndex) {
      var animateLeft, slideLeft;
      
      advance();
      
      if ($group.is(':animated') || currentIndex === newIndex) {
        return;
      }
      
      bulletArray[currentIndex].removeClass('active');
      bulletArray[newIndex].addClass('active');
      
      if (newIndex > currentIndex) {
        slideLeft = '100%';
        animateLeft = '-100%';
      } else {
        slideLeft = '-100%';
        animateLeft = '100%';
      }
      
      $slides.eq(newIndex).css({
        display: 'block',
        left: slideLeft
      });
      $group.animate({
        left: animateLeft
      }, function() {
        $slides.eq(currentIndex).css({
          display: 'none'
        });
        $slides.eq(newIndex).css({
          left: 0
        });
        $group.css({
          left: 0
        });
        currentIndex = newIndex;
      });
    }
    
    function advance() {
      clearTimeout(timeout);
      timeout = setTimeout(function() {
        if (currentIndex < ($slides.length - 1)) {
          move(currentIndex + 1);
        } else {
          move(0);
        }
      }, 4000);
    }
    
    $('.next_btn').on('click', function() {
      if (currentIndex < ($slides.length - 1)) {
        move(currentIndex + 1);
      } else {
        move(0);
      }
    });
    
    $('.previous_btn').on('click', function() {
      if (currentIndex !== 0) {
        move(currentIndex - 1);
      } else {
        move(3);
      }
    });
    
    $.each($slides, function(index) {
      var $button = $('<a class="slide_btn">&bull;</a>');
      
      if (index === currentIndex) {
        $button.addClass('active');
      }
      $button.on('click', function() {
        move(index);
      }).appendTo('.slide_buttons');
      bulletArray.push($button);
    });
    
    advance();
  });
  /*script de SLIDER AUTOMATICO*/

const productContainers = [...document.querySelectorAll('.product-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})




/**************************************************/

/*!     
        jquery.picZoomer.js
        v 1.0
        David
        http://www.CodingSerf.com
*/

//放大镜控件
;(function($){
	$.fn.picZoomer = function(options){
		var opts = $.extend({}, $.fn.picZoomer.defaults, options), 
			$this = this,
			$picBD = $('<div class="picZoomer-pic-wp"></div>').css({'width':opts.picWidth+'px', 'height':opts.picHeight+'px'}).appendTo($this),
			$pic = $this.children('img').addClass('picZoomer-pic').appendTo($picBD),
			$cursor = $('<div class="picZoomer-cursor"><i class="f-is picZoomCursor-ico"></i></div>').appendTo($picBD),
			cursorSizeHalf = {w:$cursor.width()/2 ,h:$cursor.height()/2},
			$zoomWP = $('<div class="picZoomer-zoom-wp"><img src="" alt="" class="picZoomer-zoom-pic"></div>').appendTo($this),
			$zoomPic = $zoomWP.find('.picZoomer-zoom-pic'),
			picBDOffset = {x:$picBD.offset().left,y:$picBD.offset().top};

		
		opts.zoomWidth = opts.zoomWidth||opts.picWidth;
		opts.zoomHeight = opts.zoomHeight||opts.picHeight;
		var zoomWPSizeHalf = {w:opts.zoomWidth/2 ,h:opts.zoomHeight/2};

		//初始化zoom容器大小
		$zoomWP.css({'width':opts.zoomWidth+'px', 'height':opts.zoomHeight+'px'});
		$zoomWP.css(opts.zoomerPosition || {top: 0, left: opts.picWidth+30+'px'});
		//初始化zoom图片大小
		$zoomPic.css({'width':opts.picWidth*opts.scale+'px', 'height':opts.picHeight*opts.scale+'px'});

		//初始化事件
		$picBD.on('mouseenter',function(event){
			$cursor.show();
			$zoomWP.show();
			$zoomPic.attr('src',$pic.attr('src'))
		}).on('mouseleave',function(event){
			$cursor.hide();
			$zoomWP.hide();
		}).on('mousemove', function(event){
			var x = event.pageX-picBDOffset.x,
				y = event.pageY-picBDOffset.y;

			$cursor.css({'left':x-cursorSizeHalf.w+'px', 'top':y-cursorSizeHalf.h+'px'});
			$zoomPic.css({'left':-(x*opts.scale-zoomWPSizeHalf.w)+'px', 'top':-(y*opts.scale-zoomWPSizeHalf.h)+'px'});

		});
		return $this;

	};
	$.fn.picZoomer.defaults = {
        picHeight: 460,
		scale: 2.5,
		zoomerPosition: {top: '0', left: '380px'},

		zoomWidth: 400,
		zoomHeight: 460
	};
})(jQuery); 


$(document).ready(function () {
     $('.picZoomer').picZoomer();
    $('.piclist li').on('click', function (event) {
        var $pic = $(this).find('img');
        $('.picZoomer-pic').attr('src', $pic.attr('src'));
    });
   
  var owl = $('#recent_post');
              owl.owlCarousel({
                margin:20,
                dots:false,
                nav: true,
                navText: [
                  "<i class='fa fa-chevron-left'></i>",
                  "<i class='fa fa-chevron-right'></i>"
                ],
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                  0: {
                    items: 2
                  },
                  600: {
                    items:3
                  },
                  1000: {
                    items:5
                  },
                  1200: {
                    items:4
                  }
                }
  });    
  
        $('.decrease_').click(function () {
            decreaseValue(this);
        });
        $('.increase_').click(function () {
            increaseValue(this);
        });
        function increaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value++;
            $(_this).siblings('input#number').val(value);
        }

        function decreaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            $(_this).siblings('input#number').val(value);
        }
    });

    

    
    
    








//courtesy to the super coder I can't recall
! function(e) {
  "use strict";

function t(e) {
  return new RegExp("(^|\\s+)" + e + "(\\s+|$)")
}

function s(e, t) {
  var s = l(e, t) ? i : n;
  s(e, t)
}
var l, n, i;
"classList" in document.documentElement ? (l = function(e, t) {
  return e.classList.contains(t)
}, n = function(e, t) {
  e.classList.add(t)
}, i = function(e, t) {
  e.classList.remove(t)
}) : (l = function(e, s) {
  return t(s).test(e.className)
}, n = function(e, t) {
  l(e, t) || (e.className = e.className + " " + t)
}, i = function(e, s) {
  e.className = e.className.replace(t(s), " ")
});
var c = {
  hasClass: l,
  addClass: n,
  removeClass: i,
  toggleClass: s,
  has: l,
  add: n,
  remove: i,
  toggle: s
};
"function" == typeof define && define.amd ? define(c) : e.classie = c
}(window),
function(e) {
"use strict";

function t(e, t) {
  if (!e) return !1;
  for (var s = e.target || e.srcElement || e || !1; s && s != t;) s = s.parentNode || !1;
  return s !== !1
}

function s(e, t) {
  for (var s in t) t.hasOwnProperty(s) && (e[s] = t[s]);
  return e
}

function l(e, t) {
  this.el = e, this.options = s({}, this.options), s(this.options, t), this._init()
}
l.prototype.options = {
newTab: !0,
stickyPlaceholder: !0,
onChange: function() {
return !1
}
}, l.prototype._init = function() {
var e = this.el.querySelector("option[selected]");
this.hasDefaultPlaceholder = e && e.disabled, this.selectedOpt = e || this.el.querySelector("option"), this._createSelectEl(), this.selOpts = [].slice.call(this.selEl.querySelectorAll("li[data-option]")), this.selOptsCount = this.selOpts.length, this.current = this.selOpts.indexOf(this.selEl.querySelector("li.cs-selected")) || -1, this.selPlaceholder = this.selEl.querySelector("span.cs-placeholder"), this._initEvents()
}, l.prototype._createSelectEl = function() {
var e = "",
t = function(e) {
var t = "",
s = "",
l = "";
return !e.selectedOpt || this.foundSelected || this.hasDefaultPlaceholder || (s += "cs-selected ", this.foundSelected = !0), e.getAttribute("data-class") && (s += e.getAttribute("data-class")), e.getAttribute("data-link") && (l = "data-link=" + e.getAttribute("data-link")), "" !== s && (t = 'class="' + s + '" '), "<li " + t + l + ' data-option data-value="' + e.value + '"><span>' + e.textContent + "</span></li>"
};
[].slice.call(this.el.children).forEach(function(s) {
if (!s.disabled) {
var l = s.tagName.toLowerCase();
"option" === l ? e += t(s) : "optgroup" === l && (e += '<li class="cs-optgroup"><span>' + s.label + "</span><ul>", [].slice.call(s.children).forEach(function(s) {
e += t(s)
}), e += "</ul></li>")
}
});
var s = '<div class="cs-options"><ul>' + e + "</ul></div>";
this.selEl = document.createElement("div"), this.selEl.className = this.el.className, this.selEl.tabIndex = this.el.tabIndex, this.selEl.innerHTML = '<span class="cs-placeholder">' + this.selectedOpt.textContent + "</span>" + s, this.el.parentNode.appendChild(this.selEl), this.selEl.appendChild(this.el)
}, l.prototype._initEvents = function() {
var e = this;
this.selPlaceholder.addEventListener("click", function() {
e._toggleSelect()
}), this.selOpts.forEach(function(t, s) {
t.addEventListener("click", function() {
e.current = s, e._changeOption(), e._toggleSelect()
})
}), document.addEventListener("click", function(s) {
var l = s.target;
e._isOpen() && l !== e.selEl && !t(l, e.selEl) && e._toggleSelect()
}), this.selEl.addEventListener("keydown", function(t) {
var s = t.keyCode || t.which;
switch (s) {
case 38:
t.preventDefault(), e._navigateOpts("prev");
break;
case 40:
t.preventDefault(), e._navigateOpts("next");
break;
case 32:
t.preventDefault(), e._isOpen() && "undefined" != typeof e.preSelCurrent && -1 !== e.preSelCurrent && e._changeOption(), e._toggleSelect();
break;
case 13:
t.preventDefault(), e._isOpen() && "undefined" != typeof e.preSelCurrent && -1 !== e.preSelCurrent && (e._changeOption(), e._toggleSelect());
break;
case 27:
t.preventDefault(), e._isOpen() && e._toggleSelect()
}
})
}, l.prototype._navigateOpts = function(e) {
this._isOpen() || this._toggleSelect();
var t = "undefined" != typeof this.preSelCurrent && -1 !== this.preSelCurrent ? this.preSelCurrent : this.current;
("prev" === e && t > 0 || "next" === e && t < this.selOptsCount - 1) && (this.preSelCurrent = "next" === e ? t + 1 : t - 1, this._removeFocus(), classie.add(this.selOpts[this.preSelCurrent], "cs-focus"))
}, l.prototype._toggleSelect = function() {
this._removeFocus(), this._isOpen() ? (-1 !== this.current && (this.selPlaceholder.textContent = this.selOpts[this.current].textContent), classie.remove(this.selEl, "cs-active")) : (this.hasDefaultPlaceholder && this.options.stickyPlaceholder && (this.selPlaceholder.textContent = this.selectedOpt.textContent), classie.add(this.selEl, "cs-active"))
}, l.prototype._changeOption = function() {
"undefined" != typeof this.preSelCurrent && -1 !== this.preSelCurrent && (this.current = this.preSelCurrent, this.preSelCurrent = -1);
var t = this.selOpts[this.current];
this.selPlaceholder.textContent = t.textContent, this.el.value = t.getAttribute("data-value");
var s = this.selEl.querySelector("li.cs-selected");
s && classie.remove(s, "cs-selected"), classie.add(t, "cs-selected"), t.getAttribute("data-link") && (this.options.newTab ? e.open(t.getAttribute("data-link"), "_blank") : e.location = t.getAttribute("data-link")), this.options.onChange(this.el.value)
}, l.prototype._isOpen = function() {
return classie.has(this.selEl, "cs-active")
}, l.prototype._removeFocus = function() {
var e = this.selEl.querySelector("li.cs-focus");
e && classie.remove(e, "cs-focus")
}, e.SelectFx = l
}(window),
function() {
[].slice.call(document.querySelectorAll("select.cs-select")).forEach(function(e) {
new SelectFx(e)
})
}();



/***************************CONTADOR*************************************************/
document.addEventListener('DOMContentLoaded', start);
function start() {
  var btnInc = document.querySelector('.btn-inc');
  var btnDesc = document.querySelector('.btn-desc');
  var counterValue = document.querySelector('.counter-value');
  // attach event listener
  btnInc.addEventListener('click', function() {
    var value = +counterValue.value;
    var max = + counterValue.max;
    if (value < max) {
      counterValue.value = value + 1;
    }
  });
  btnDesc.addEventListener('click', function() {
    var value = +counterValue.value;
    var min = + counterValue.min;
    if (value > min) {
      counterValue.value = value - 1;
    }
  });
}

/*nuevo contador*****************/
// SHOPPING CART PLUS OR MINUS
$('a.qty-minus').on('click', function(e) {
  e.preventDefault();
  var $this = $(this);
  var $input = $this.closest('div').find('input');
  var value = parseInt($input.val());
  
  if (value > 1) {
    value = value - 1;
  } else {
    value = 0;
  }
  
  $input.val(value);
      
});

$('a.qty-plus').on('click', function(e) {
  e.preventDefault();
  var $this = $(this);
  var $input = $this.closest('div').find('input');
  var value = parseInt($input.val());

  if (value < 100) {
  value = value + 1;
  } else {
    value =1;
  }

  $input.val(value);
});

// RESTRICT INPUTS TO NUMBERS ONLY WITH A MIN OF 0 AND A MAX 100
$('input').on('blur', function(){

var input = $(this);
var value = parseInt($(this).val());

  if (value < 1 || isNaN(value)) {
    input.val();
  } else if
    (value > 50) {
    input.val(50);
  }
});


/** */
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



/*******************PAGINACIÓN SCRIPT*******************************/
/* * * * * * * * * * * * * * * * *
 * Pagination
 * javascript page navigation
 * * * * * * * * * * * * * * * * */

var Pagination = {

  code: '',

  // --------------------
  // Utility
  // --------------------

  // converting initialize data
  Extend: function(data) {
      data = data || {};
      Pagination.size = data.size || 300;
      Pagination.page = data.page || 1;
      Pagination.step = data.step || 3;
  },

  // add pages by number (from [s] to [f])
  Add: function(s, f) {
      for (var i = s; i < f; i++) {
          Pagination.code += '<a>' + i + '</a>';
      }
  },

  // add last page with separator
  Last: function() {
      Pagination.code += '<i>...</i><a>' + Pagination.size + '</a>';
  },

  // add first page with separator
  First: function() {
      Pagination.code += '<a>1</a><i>...</i>';
  },



  // --------------------
  // Handlers
  // --------------------

  // change page
  Click: function() {
      Pagination.page = +this.innerHTML;
      Pagination.Start();
  },

  // previous page
  Prev: function() {
      Pagination.page--;
      if (Pagination.page < 1) {
          Pagination.page = 1;
      }
      Pagination.Start();
  },

  // next page
  Next: function() {
      Pagination.page++;
      if (Pagination.page > Pagination.size) {
          Pagination.page = Pagination.size;
      }
      Pagination.Start();
  },



  // --------------------
  // Script
  // --------------------

  // binding pages
  Bind: function() {
      var a = Pagination.e.getElementsByTagName('a');
      for (var i = 0; i < a.length; i++) {
          if (+a[i].innerHTML === Pagination.page) a[i].className = 'current';
          a[i].addEventListener('click', Pagination.Click, false);
      }
  },

  // write pagination
  Finish: function() {
      Pagination.e.innerHTML = Pagination.code;
      Pagination.code = '';
      Pagination.Bind();
  },

  // find pagination type
  Start: function() {
      if (Pagination.size < Pagination.step * 2 + 6) {
          Pagination.Add(1, Pagination.size + 1);
      }
      else if (Pagination.page < Pagination.step * 2 + 1) {
          Pagination.Add(1, Pagination.step * 2 + 4);
          Pagination.Last();
      }
      else if (Pagination.page > Pagination.size - Pagination.step * 2) {
          Pagination.First();
          Pagination.Add(Pagination.size - Pagination.step * 2 - 2, Pagination.size + 1);
      }
      else {
          Pagination.First();
          Pagination.Add(Pagination.page - Pagination.step, Pagination.page + Pagination.step + 1);
          Pagination.Last();
      }
      Pagination.Finish();
  },



  // --------------------
  // Initialization
  // --------------------

  // binding buttons
  Buttons: function(e) {
      var nav = e.getElementsByTagName('a');
      nav[0].addEventListener('click', Pagination.Prev, false);
      nav[1].addEventListener('click', Pagination.Next, false);
  },

  // create skeleton
  Create: function(e) {

      var html = [
          '<a>&#9668;</a>', // previous button
          '<span></span>',  // pagination container
          '<a>&#9658;</a>'  // next button
      ];

      e.innerHTML = html.join('');
      Pagination.e = e.getElementsByTagName('span')[0];
      Pagination.Buttons(e);
  },

  // init
  Init: function(e, data) {
      Pagination.Extend(data);
      Pagination.Create(e);
      Pagination.Start();
  }
};



/* * * * * * * * * * * * * * * * *
* Initialization
* * * * * * * * * * * * * * * * */

var init = function() {
  Pagination.Init(document.getElementById('pagination'), {
      size: 30, // pages size
      page: 1,  // selected page
      step: 3   // pages before and after current
  });
};

document.addEventListener('DOMContentLoaded', init, false);







