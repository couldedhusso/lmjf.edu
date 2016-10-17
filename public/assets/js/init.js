jQuery(function($){
	"use strict";

var namespace = window.namespace || {};


/* ==================================================
   Accordion
================================================== */
	namespace.accordion = function(){
		var accordion_trigger = $('.accordion-heading.accordionize');

		accordion_trigger.delegate('.accordion-toggle','click', function(event){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				accordion_trigger.find('.active').addClass('inactive');
				accordion_trigger.find('.active').removeClass('active');
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			event.preventDefault();
		});
	}
/* ==================================================
   Toggle
================================================== */
	namespace.toggle = function(){
		var accordion_trigger_toggle = $('.accordion-heading.togglize');

		accordion_trigger_toggle.delegate('.accordion-toggle','click', function(event){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			event.preventDefault();
		});
	}

/* ==================================================
   Twitter Widget
================================================== */
	namespace.TwitterWidget = function() {
		$('.twitter-widget').each(function(){
			var twitterInstance = $(this);
			var twitterTweets = twitterInstance.attr("data-tweets-count") ? twitterInstance.attr("data-tweets-count") : "1"
			twitterInstance.twittie({
            	dateFormat: '%b. %d, %Y',
            	template: '<li><i class="fa fa-twitter"></i> {{tweet}} <span class="tweet-date">{{date}}</span></li>',
            	count: twitterTweets,
            	hideReplies: true
        	});
		});
	}
/* ==================================================
   Hero Flex Slider
================================================== */
	namespace.heroflex = function() {
		$('.heroflex').each(function(){
				var carouselInstance = $(this);
				var carouselAutoplay = carouselInstance.attr("data-autoplay") == 'yes' ? true : false
				var carouselPagination = carouselInstance.attr("data-pagination") == 'yes' ? true : false
				var carouselArrows = carouselInstance.attr("data-arrows") == 'yes' ? true : false
				var carouselDirection = carouselInstance.attr("data-direction") ? carouselInstance.attr("data-direction") : "horizontal"
				var carouselStyle = carouselInstance.attr("data-style") ? carouselInstance.attr("data-style") : "fade"
				var carouselSpeed = carouselInstance.attr("data-speed") ? carouselInstance.attr("data-speed") : "5000"
				var carouselPause = carouselInstance.attr("data-pause") == 'yes' ? true : false

				carouselInstance.flexslider({
					animation: carouselStyle,
					easing: "swing",
					direction: carouselDirection,
					slideshow: carouselAutoplay,
					slideshowSpeed: carouselSpeed,
					animationSpeed: 600,
					initDelay: 0,
					randomize: false,
					pauseOnHover: carouselPause,
					controlNav: carouselPagination,
					directionNav: carouselArrows,
					prevText: "",
					nextText: ""
				});
		});
	}
/* ==================================================
   Flex Slider
================================================== */
	namespace.galleryflex = function() {
		$('.galleryflex').each(function(){
				var carouselInstance = $(this);
				var carouselAutoplay = carouselInstance.attr("data-autoplay") == 'yes' ? true : false
				var carouselPagination = carouselInstance.attr("data-pagination") == 'yes' ? true : false
				var carouselArrows = carouselInstance.attr("data-arrows") == 'yes' ? true : false
				var carouselDirection = carouselInstance.attr("data-direction") ? carouselInstance.attr("data-direction") : "horizontal"
				var carouselStyle = carouselInstance.attr("data-style") ? carouselInstance.attr("data-style") : "fade"
				var carouselSpeed = carouselInstance.attr("data-speed") ? carouselInstance.attr("data-speed") : "5000"
				var carouselPause = carouselInstance.attr("data-pause") == 'yes' ? true : false

				carouselInstance.flexslider({
					animation: carouselStyle,
					easing: "swing",
					direction: carouselDirection,
					slideshow: carouselAutoplay,
					slideshowSpeed: carouselSpeed,
					animationSpeed: 600,
					initDelay: 0,
					animationLoop: false,
					randomize: false,
					pauseOnHover: carouselPause,
					controlNav: carouselPagination,
					directionNav: carouselArrows,
					prevText: "",
					nextText: ""
				});
		});
	}
/* ==================================================
   Owl Carousel
================================================== */
	namespace.OwlCarousel = function() {
		$('.owl-carousel').each(function(){
				var carouselInstance = $(this);
				var carouselColumns = carouselInstance.attr("data-columns") ? carouselInstance.attr("data-columns") : "1"
				var carouselitemsDesktop = carouselInstance.attr("data-items-desktop") ? carouselInstance.attr("data-items-desktop") : "4"
				var carouselitemsDesktopSmall = carouselInstance.attr("data-items-desktop-small") ? carouselInstance.attr("data-items-desktop-small") : "3"
				var carouselitemsTablet = carouselInstance.attr("data-items-tablet") ? carouselInstance.attr("data-items-tablet") : "2"
				var carouselitemsMobile = carouselInstance.attr("data-items-mobile") ? carouselInstance.attr("data-items-mobile") : "1"
				var carouselAutoplay = carouselInstance.attr("data-autoplay") ? carouselInstance.attr("data-autoplay") : false
				var carouselPagination = carouselInstance.attr("data-pagination") == 'yes' ? true : false
				var carouselArrows = carouselInstance.attr("data-arrows") == 'yes' ? true : false
				var carouselSingle = carouselInstance.attr("data-single-item") == 'yes' ? true : false
				var carouselStyle = carouselInstance.attr("data-style") ? carouselInstance.attr("data-style") : "fade"

				carouselInstance.owlCarousel({
					items: carouselColumns,
					autoPlay : carouselAutoplay,
					navigation : carouselArrows,
					pagination : carouselPagination,
					itemsDesktop:[1199,carouselitemsDesktop],
					itemsDesktopSmall:[979,carouselitemsDesktopSmall],
					itemsTablet:[768,carouselitemsTablet],
					itemsMobile:[479,carouselitemsMobile],
					singleItem:carouselSingle,
					navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
					stopOnHover: true,
					lazyLoad: true,
					transitionStyle: 'carouselStyle'
				});
		});
	}
/* ==================================================
   Magnific Popup
================================================== */
	namespace.Magnific = function() {
		jQuery('.format-gallery').each(function(){
			$(this).magnificPopup({
				delegate: 'a.popup-image', // child items selector, by clicking on it popup will open
				type: 'image',
				gallery:{enabled:true}
				// other options
			});
		});
		jQuery('.magnific-image').magnificPopup({
			type: 'image',
			gallery:{enabled:false}
			// other options
		});
		jQuery('.magnific-video').magnificPopup({
			type: 'iframe',
			gallery:{enabled:false}
			// other options
		});
	}
/* ==================================================
   Animated Counters
================================================== */
	namespace.Counters = function() {
		$('.counters').each(function () {
			$(".timer .count").appear(function() {
			var counter = $(this).html();
			$(this).countTo({
				from: 0,
				to: counter,
				speed: 2000,
				refreshInterval: 60
				});
			});
		});
	}
/* ==================================================
   SuperFish menu
================================================== */
	namespace.SuperFish = function() {
		$('.sf-menu').superfish({
			  delay: 200,
			  animation: {opacity:'show', height:'show'},
			  speed: 'fast',
			  cssArrows: false,
			  disableHI: true
		});
		$(window).resize(function(){
			if($(window).width() >= 992){
				$('.sf-menu').show();
			}
		});
		$(".dd-menu > li:has(ul)").find("a:first").append(" <i class='fa fa-angle-down'></i>");
		$(".dd-menu > li > ul > li:has(ul)").find("a:first").append(" <i class='fa fa-angle-right'></i>");
		$(".dd-menu > li > ul > li > ul > li:has(ul)").find("a:first").append(" <i class='fa fa-angle-right'></i>");
	}
/* ==================================================
   Header Functions
================================================== */
	namespace.StickyHeader = function() {
		if($('body').width() > 992 ){
			$(".main-navigation").sticky();
			$(".header-style2 .site-header").sticky();
			$(".header-style3 .site-header").sticky();
		}
	}
/* ==================================================
	Responsive Nav Menu
================================================== */
	namespace.MobileMenu = function() {
		// Responsive Toggle Events
		$('#menu-toggle').on("click", function(){
			$(this).toggleClass("opened");
			$(".dd-menu").slideToggle();
			return false;
		});
		$('#contact-info').on("click", function(){
			$(".site-header-right").slideToggle();
			return false;
		});
		$('.topbar #contact-info').on("click", function(){
			$(".topbar .header-info-cols").slideToggle();
			return false;
		});
	}
/* ==================================================
   IsoTope Portfolio
================================================== */
		namespace.IsoTope = function() {
		$("ul.sort-source").each(function() {
			var source = $(this);
			var destination = $("ul.sort-destination[data-sort-id=" + $(this).attr("data-sort-id") + "]");
			if(destination.get(0)) {
				$(window).load(function() {
					destination.isotope({
						itemSelector: ".grid-item",
						layoutMode: 'sloppyMasonry'
					});
					source.find("a").on("click", function(e) {
						e.preventDefault();
						var $this = $(this),
							filter = $this.parent().attr("data-option-value");
						source.find("li.active").removeClass("active");
						$this.parent().addClass("active");
						destination.isotope({
							filter: filter
						});
						if(window.location.hash != "" || filter.replace(".","") != "*") {
							self.location = "#" + filter.replace(".","");
						}
						return false;
					});
					$(window).on("hashchange", function(e) {
						var hashFilter = "." + location.hash.replace("#",""),
							hash = (hashFilter == "." || hashFilter == ".*" ? "*" : hashFilter);
						source.find("li.active").removeClass("active");
						source.find("li[data-option-value='" + hash + "']").addClass("active");
						destination.isotope({
							filter: hash
						});
					});
					var hashFilter = "." + (location.hash.replace("#","") || "*");
					var initFilterEl = source.find("li[data-option-value='" + hashFilter + "'] a");
					if(initFilterEl.get(0)) {
						source.find("li[data-option-value='" + hashFilter + "'] a").click();
					} else {
						source.find("li:first-child a").click();
					}
				});
			}
		});
		$(window).load(function() {
			var IsoTopeCont = $(".isotope-grid");
			IsoTopeCont.isotope({
				itemSelector: ".grid-item",
				layoutMode: 'sloppyMasonry'
			});
			if ($(".grid-holder").length > 0){
				var $container_blog = $('.grid-holder');
				$container_blog.isotope({
					itemSelector : '.grid-item'
				});
				$(window).resize(function() {
					var $container_blog = $('.grid-holder');
					$container_blog.isotope({
						itemSelector : '.grid-item'
					});
				});
			}
		});
	}
/* ==================================================
   Pricing Tables
================================================== */
	var $tallestCol;
	namespace.pricingTable = function(){
		$('.pricing-table').each(function(){
			$tallestCol = 0;
			$(this).find('> div .features').each(function(){
				($(this).height() > $tallestCol) ? $tallestCol = $(this).height() : $tallestCol = $tallestCol;
			});
			if($tallestCol == 0) $tallestCol = 'auto';
			$(this).find('> div .features').css('height',$tallestCol);
		});
	}
/* ==================================================
   Circle Progress
================================================== */
	namespace.CProgress = function() {
		$('.cProgress').each(function(){
			var cproInstance = $(this);
			var cprocomplete = cproInstance.attr("data-complete") ? cproInstance.attr("data-complete") : "0.1"
			var cprocolor = cproInstance.attr("data-color") ? cproInstance.attr("data-color") : "d82e67"
			var cprocompleteperc = cprocomplete/100
			cproInstance.circleProgress({
				value: cprocompleteperc,
				size: 60.0,
				emptyFill: 'rgba(0, 0, 0, .1)',
				fill: { color: '#'+cprocolor }
			}).on('circle-animation-progress', function(event, progress) {
				cproInstance.find('strong').html(parseInt(cprocomplete * progress, 10) + '<i>%</i>');
			});
		});
	}

/* ==================================================
   Init Functions
================================================== */
$(document).ready(function(){

	namespace.accordion();
	namespace.toggle();
	namespace.TwitterWidget();
	namespace.OwlCarousel();
	namespace.Magnific();
	namespace.SuperFish();
	namespace.Counters();
	namespace.IsoTope();
	namespace.StickyHeader();
	namespace.heroflex();
	namespace.galleryflex();
	namespace.pricingTable();
	namespace.MobileMenu();
	namespace.CProgress();
	$('.selectpicker').selectpicker({container:'body'});
	WWHGetter();
	// apply matchHeight to each item container's items
	$('.content').each(function() {
		$(this).find('.owl-carousel .grid-item').find('.grid-item-content').matchHeight({
			//property: 'min-height'
		});
	});
});

// DESIGN ELEMENTS //

// WINDOW RESIZE FUNCTIONS //
$(window).resize(function(){
	WWHGetter();
});

// Any Button Scroll to section
$('.scrollto').on("click", function(){
	$.scrollTo( this.hash, 800, { easing:'easeOutQuint' });
	return false;
});

// FITVIDS
$(".fw-video, .post-media").fitVids();

$(window).load(function(){
	$(".format-image").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><span class='icon'><i class='fa fa-search'></i></span></span>");
	});
	$(".format-standard").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><span class='icon'><i class='fa fa-plus'></i></span></span>");
	});
	$(".format-video").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><span class='icon'><i class='fa fa-play'></i></span></span>");
	});
	$(".format-link").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><span class='icon'><i class='fa fa-link'></i></span></span>");
	});
	$(".additional-images .owl-carousel .item-video").each(function(){
		$(this).append("<span class='icon'><i class='fa fa-play'></i></span>");
	});
	$(".magnific-image").append("<span class='zoom'><span class='icon'><i class='fa fa-search'></i></span></span>");
	namespace.StickyHeader();
	$('.carousel-wrapper').css('background','none');

});

// Icon Append
$('.basic-link').append(' <i class="fa fa-arrow-circle-right"></i>');
$('.basic-link.backward').prepend(' <i class="fa fa-angle-left"></i> ');
$('ul.checks li').prepend('<i class="fa fa-check"></i> ');
$('ul.angles li, .widget_categories ul li a, .widget_archive ul li a, .widget_recent_entries ul li a, .widget_recent_comments ul li a, .widget_links ul li a, .widget_meta ul li a').prepend('<i class="fa fa-caret-right"></i> ');
$('ul.chevrons li').prepend('<i class="fa fa-chevron-right"></i> ');
$('ul.carets li, ul.inline li').prepend('<i class="fa fa-caret-right"></i> ');
$('a.external').prepend('<i class="fa fa-external-link"></i> ');

// Animation Appear
var AppDel;
function AppDelFunction($appd) {
	$appd.addClass("appear-animation");
	if(!$("html").hasClass("no-csstransitions") && $(window).width() > 767) {
		$appd.appear(function() {
			var delay = ($appd.attr("data-appear-animation-delay") ? $appd.attr("data-appear-animation-delay") : 1);
			if(delay > 1) $appd.css("animation-delay", delay + "ms");
			$appd.addClass($appd.attr("data-appear-animation"));
			setTimeout(function() {
				$appd.addClass("appear-animation-visible");
			}, delay);
			clearTimeout();
		}, {accX: 0, accY: -150});
	} else {
		$appd.addClass("appear-animation-visible");
	}
}
function AppDelStopFunction() {
	clearTimeout(AppDel);
}
$("[data-appear-animation]").each(function() {
	var $this = $(this);
	AppDelFunction($this);
	AppDelStopFunction();
});
// Animation Progress Bars

var AppAni;
function AppAniFunction($anim) {
	$anim.appear(function() {
		var delay = ($anim.attr("data-appear-animation-delay") ? $anim.attr("data-appear-animation-delay") : 1);
		if(delay > 1) $anim.css("animation-delay", delay + "ms");
		$anim.addClass($anim.attr("data-appear-animation"));
		setTimeout(function() {
			$anim.animate({
				width: $anim.attr("data-appear-progress-animation")
			}, 1500, "easeOutQuad", function() {
				$anim.find(".progress-bar-tooltip").animate({
					opacity: 1
				}, 500, "easeOutQuad");
			});
		}, delay);
		clearTimeout();
	}, {accX: 0, accY: -50});
}
function AppAniStopFunction() {
	clearTimeout(AppAni);
}
$("[data-appear-progress-animation]").each(function() {
	var $this = $(this);
	AppAniFunction($this);
	AppAniStopFunction();
});

// Parallax Jquery Callings
if(!Modernizr.touch) {
	parallaxInit();
}
function parallaxInit() {
	$('.parallax1').parallax("50%", 0.1);
	$('.parallax2').parallax("50%", 0.1);
	$('.parallax3').parallax("50%", 0.1);
	$('.parallax4').parallax("50%", 0.1);
	$('.parallax5').parallax("50%", 0.1);
	$('.parallax6').parallax("50%", 0.1);
	$('.parallax7').parallax("50%", 0.1);
	$('.parallax8').parallax("50%", 0.1);
	/*add as necessary*/
}

// Window height/Width Getter Classes
function WWHGetter(){
	var wheighter = $(window).height();
	var wwidth = $(window).width();
	$(".wheighter").css("height",wheighter);
	$(".wwidth").css("width",wwidth);
}
});
