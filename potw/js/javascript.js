// Developer: Aaron Landry

// FUNCTIONS
$.fn.visible = function(partial) {  
	var $t            = $(this),
	$w            = $(window),
	viewTop       = $w.scrollTop(),
	viewBottom    = viewTop + $w.height(),
	_top          = $t.offset().top,
	_bottom       = _top + $t.height(),
	compareTop    = partial === true ? _bottom : _top,
	compareBottom = partial === true ? _top : _bottom;

	return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
};

$.fn.square = function() {
	$(this).each(function() {
		$(this).outerHeight($(this).outerWidth());
	});
};

// Position fixed full screen background
$.fn.bgFixed = function() {
	var scrolledY = $(window).scrollTop();
	$(this).css('background-position', 'left ' + ((scrolledY)) + 'px');
};
$.fn.sectionSizing = function() {
	var headerHeight = $(".header-top").outerHeight();
	var subheadHeight = $(".sticky-container-inner.container-fixed").outerHeight();
	var headHeight = headerHeight+subheadHeight;
	$(".section").css("min-height", $(window).height()-headHeight + "px");
	$(".max-height").css("max-height", $(window).height() + "px");
	$(".full-height").css("height", $(window).height() + "px");
	$(".parent-height").each(function() {
		$(this).css("height", $(this).parent().height() + "px");
	});
};
$.fn.makeItFit = function() {
	$(this).each(function() {
		var set = $(this);
		var videoWrap = set.find('.video-wrapper');
		var video = set.find('.video');
		var play = set.find('.play');
		var pause = set.find('.pause');
		
		play.on('click', function(){
			video.get(0).play();
			set.addClass('active');
			play.hide();
		});
		pause.on('click', function(){
			video.get(0).pause();
		});
		set.fitVids();
	});
};
$.fn.countUp = function(options) {
	options = options || {};
	this.each(function () {
			$(this).data('val', parseInt(($(this).text().replace(/[\.,]/,'') || '0'), 10));
			this.innerHTML = 0;
		})
		.on('inview', function(ev, isInView) {
			// cache base value + remove dot or comma, and get it
			var i = +$(this).data('val'), // || +($(this).data('val', v=parseInt(($(this).text().replace(/[\.,]/,'') || '0'), 10)), v),
				self = this;

			if (isInView) {

									// uses easing!
				$({n: 0}).stop(true).animate({n: i},
					{
						duration: $.speed(options.duration || $(this).data('count-duration')).duration,
						step: function(now, fx) {
							self.innerHTML = parseInt(now, 10).toLocaleString('en-US'); // use comma per thousand version
						}
					}
				);

			}
			// this seems not to work
			else {
				self.innerHTML = 0;
			}
		});
};

$.fn.tab = function() {
  $(this).each(function() {
    var itemLinks = $(this).find('[data-tabbed-link]');
    var itemLinksActive = $(this).find('[data-tabbed-item="active"]');
    var itemContent = $(this).find('[data-tabbed-item]');
    var itemControl = $(this).data('tabbed-control');
    itemContent.hide();
	itemLinksActive.show();
		itemLinksActive.on('load', function(e) {
    	var item = $(this).data('tabbed-item');
      alert(item);
    });
    itemLinks.on('click', function(e) {
      e.preventDefault();
      var link = $(this).data('tabbed-link');
      if ($(this).attr('class') === 'active') {
        //itemContent.hide();
        //itemLinks.removeClass('active');
			} else {
        itemContent.hide();
        $("#" + link).fadeToggle("slow", "linear");
        itemLinks.removeClass('active');
        $("#" + link).addClass('active');
        itemLinks.removeClass('active');
        $(this).addClass('active');
      }
    });
    
    $('#' + itemControl + ' .expand').on('click', function(e) {
      e.preventDefault();
      itemContent.show();
    });
    $('#' + itemControl + ' .collapse').on('click', function(e) {
      e.preventDefault();
      itemContent.hide();
    });
  });
};

$(window).bind("load", function() {
	//$('.loader').animate({'opacity': '0'}, 800, function(){
//		$(this).css({'display': 'none'});
//		$(".bg").animate({'opacity': '1'}, 800);
//	});
	//$("body").css("display", "none");
//	$("body").fadeIn(1000); 
	$('.nav-menu li a').click(function(e){
		var redirect = $(this).attr('href');
		e.preventDefault();
		$('body').fadeOut(400, function(){
			document.location.href = redirect
		});
	});
	
	
});
$(window).on('scroll', function () {
	$(".animated").each(function(i, el) {
		var el = $(el);
		if (el.visible(true)) {
			el.addClass("come-in");
		}
	});
	
	
});

$(function () {
	$(".animated").each(function(i, el) {
		var el = $(el);
		if (el.visible(true)) {
			el.addClass("come-in");
		}
	});
	var rellax = new Rellax('.rellax', {
    wrapper:'.content'
  });
	
	$('.edge-control').on('click', function(){
		$('.edge-menu li').toggleClass('push');
	});
	if ($('.video-container').length > 0) {
		$('.video-container').makeItFit();
	}
	//var cip = $(".video-js").hover( hoverVideo, hideVideo );
//	function hoverVideo(e) {  
//		$('video', this).get(0).play();
//		$('video', this).prop('muted', true);
//		$('video', this).prop('controls', false);
//	}
//	function hideVideo(e) {
//		$('video', this).get(0).pause(); 
//	}
	
	//if ($('.video-js').length > 0) {
//		if($(window).width() >= 769){
//			var sources = document.querySelectorAll('video.video-js source');
//			// Define the video object this source is contained inside
//			var video = document.querySelector('video.video-js');
//			for(var i = 0; i<sources.length;i++) {
//			  sources[i].setAttribute('src', sources[i].getAttribute('data-src'));
//			}
//			// If for some reason we do want to load the video after, for desktop as opposed to mobile (I'd imagine), use videojs API to load
//			video.load();
//		}
//	}
	$('.square').square();
	$('.tabbed').tab();
	$(window).resize(function() {
		$('.square').square();
	});
	$.fn.sectionSizing();
	$(window).resize(function() {
		$.fn.sectionSizing();
	});
    $('.post-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        speed: 1000
	});
	$('.slick').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        speed: 1000
	});
	$('.service-carousel').slick({
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 1
	});
	$('.gallery').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1
	});
	
	$('.slider-teams-nav').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.slider-teams',
		dots: false,
		focusOnSelect: true,
		adaptiveHeight: true,
		 responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	  ]
	});
	$('.slider-teams').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-teams-nav'
	});
	$('.team-on').on('click', function(){
		$('.slider-teams').addClass('on');
		$('.slider-teams-nav').removeClass('on');
	});
	$('.team-off').on('click', function(){
		$('.slider-teams').removeClass('on');
		$('.slider-teams-nav').addClass('on');
	});
	
	
	$('[count="up"]').countUp();
	
	//NAV
	$.fn.edgeMenu('.edge-menu','right','closed',false,true);
	$('.current-menu-item').addClass('active');
	//NAV
	
	// Sticky Element - Sticks the element to the top of the site
	$(".sticky").wrap("<div class='sticky-container'></div>");
	$(".sticky").wrap("<div class='sticky-container-inner'></div>");
	$(window).on('scroll', function () {
		var scrollTop	= $(window).scrollTop(),
		elementOffset	= $('.sticky-container').offset().top,
		distance		= (elementOffset - scrollTop);
		$(".sticky-container").height($(".sticky-container-inner").outerHeight());
		if(distance < 0){
			$('.sticky-container-inner').addClass('container-fixed');
		} else {
			$('.sticky-container-inner').removeClass('container-fixed');
		}
	});
	
	
	// SMOOTH SCROLL
	if ($('.scroll').length > 0) {
		$(".scroll").on("click", function(event){
			event.preventDefault();
			//calculate destination place
			var dest=0;
			var destOffset = 180;
			if($(this.hash).offset().top > $(document).height()-$(window).height()){
				dest=$(document).height()-$(window).height();
			}else{
				dest=$(this.hash).offset().top;
			}
			//go to destination
			$('html,body').animate({scrollTop:dest-destOffset}, 1000,'swing');
		});
	}
	
	
	// LAYOUT
	//Masonry Grid
	if ($('.grid').length > 0) {
		var $grid = $('.grid').packery({
			itemSelector: '.item'
		});
		$grid.imagesLoaded().progress( function() {
			$grid.packery();
		});
	}
	//Auto Adust Height Grid
	if($(window).width() >= 768){
		var $gridbox = $('.grid-box').imagesLoaded( function() {
		$gridbox.each(function(){  
			var $columns = $('.item',this);
			var maxHeight = Math.max.apply(Math, $columns.map(function(){
				return $(this).height();
			}).get());
			$columns.height(maxHeight);
			});
		});
	}
	if ($(window).width() >= 800){
		$(window).scroll(function() {
			$('.img-fixed').bgFixed();
		});
	}
	$(".fancy").fancybox();
	
	
	
	var hash = window.location.hash;// get the hash after it changes
	if ($('#iso').length > 0) {
		// init Isotope
			if(hash == '#risk'){
				var $filter = '.risk';
				var $sort = 'name';
				$('#iso').removeClass('leader-active');
				$('#iso').addClass('risk-active');
				$('#iso').removeClass('benefits-active');
				$('.iso-filters li a.risk').addClass('is-checked');
				setTimeout(function() {
					$('html,body').animate({scrollTop:$(hash).offset().top}, 500,'swing');
				}, 1000);
			}else if(hash == '#benefits'){
				var $filter = '.benefits';
				var $sort = 'name';
				$('#iso').removeClass('leader-active');
				$('#iso').removeClass('risk-active');
				$('#iso').addClass('benefits-active');
				$('.iso-filters li a.benefits').addClass('is-checked');
				setTimeout(function() {
					$('html,body').animate({scrollTop:$(hash).offset().top}, 500,'swing');
				}, 1000);
			}else{
				var $filter = '.executive';
				var $sort = 'original-order';
				$('.iso-filters li a.executive').addClass('is-checked');
			}
		
			var $container = $('#iso').isotope({
				getSortData: {
					name: '.name'
				},
				layoutMode: 'packery',
				itemSelector: '.item',
				percentPosition: true,
				filter: $filter,
				sortBy: $sort,
				hiddenStyle: {
					opacity: 0
				},
				visibleStyle: {
					opacity: 1
				}
				
			});
			// layout Isotope again after all images have loaded
			$container.imagesLoaded( function() {
				$container.isotope('layout');
				var elems = $container.isotope('getFilteredItemElements');
				$(elems).addClass('active');
			});
		// store filter for each group
		var $filters = {};

		$('.iso-filters').on( 'click', '.button', function() {
			var $this = $(this); // get group key
			var $buttonGroup = $this.parents('.button-group');
			var $filterGroup = $buttonGroup.attr('data-filter-group');
			$filters[ $filterGroup ] = $this.attr('data-filter'); // set filter for group
			// combine filters
			var $filterValue = '';
			for ( var prop in $filters ) {
				$filterValue += $filters[ prop ];
			}
			var sortValue = $(this).attr('data-sort-value');
			sortValue = sortValue.split(','); // make an array of values
			// set filter for Isotope
			$container.removeClass('leader-active');
			$container.removeClass('risk-active');
			$container.removeClass('benefits-active');
			$container.addClass($filterValue.replace(".", "") + '-active');
			$container.isotope({
				filter: $filterValue,
				sortBy: sortValue
			});
			var allelems = $container.isotope('getItemElements');
			var elems = $container.isotope('getFilteredItemElements');
			$(allelems).removeClass('active');
			$(elems).addClass('active');
			$('.square').square();
		});

		// change is-checked class on buttons
		$('.button-group').each( function( i, buttonGroup ) {
			var $buttonGroup = $( buttonGroup );
			$buttonGroup.on( 'click', '.button', function() {
				$buttonGroup.find('.is-checked').removeClass('is-checked');
				$( this ).addClass('is-checked');
			});
		});
		
		$container.isotope({
			// disable window resizing
			resizable: false
		});
	}

	if ($('.nav-accordion').length > 0) {
		$(".nav-accordion li:has(ul li)").find("a:first").addClass("subs");
		$( "<i class='fa fa-angle-down'></i>" ).appendTo( ".nav-accordion .subs" );
		$('.nav-accordion .subs i').on("click",function(e){
			e.preventDefault();
			$(this).parent().parent().find('ul:first').toggle();
		});
	}
	
	
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
	
	
	





var brandSlider = $('.owl-carousel');
function brandSliderClasses() {
    brandSlider.each(function() {
        var total = $(this).find('.owl-item.active').length;
        $(this).find('.owl-item').removeClass('firstactiveitem');
        $(this).find('.owl-item').removeClass('lastactiveitem');
        $(this).find('.owl-item.active').each(function(index) {
            if (index === 0) {
                $(this).addClass('firstactiveitem')
            }
            if (index === total - 1 && total > 1) {
                $(this).addClass('lastactiveitem')
            }
        })
    })
}
brandSliderClasses();
brandSlider.on('translated.owl.carousel', function(event) {
    brandSliderClasses()
}); 



brandSlider.owlCarousel({
    rtl:true,
    loop:false,
    margin:0,
	navContainer: '.time-nav',
    nav:true,
	URLhashListener:true,
    responsive:{
        0:{
            items:1
        },
		600:{
            items:1
        },
        973:{
            items:2
        },
        1000:{
            items:4
        }
    }
});

$('.owl-stage').find('.owl-item.active').first().addClass('firstactiveitem');
	
	
	$('.sh-container').each(function(){
		var $sh = $(this);
		var $shLink = $sh.find('.sh-link');
		$shLink.on('click', function(e){
			e.preventDefault();
			
			$('.sh-container').removeClass('active');
			$sh.addClass('active');
		});
		$('.sh-close').on('click', function(e){
			e.preventDefault();
			$('.sh-container').removeClass('active');
		});
	});	
});

