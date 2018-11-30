/*
 *	Name: Known JS
 *	Description: Customized JavasCript for Jack Friedman
 *	Auther: Xola Sikafungana - Known Design
 *_______________________________________________________*/



// No-Conflict jQuery fucntion
(function($) {


	/*
	 *
	 *
	 * Bootstrap Carousel Swipe v1.1
	 *
	 * jQuery plugin to enable swipe gestures on Bootstrap 3 carousels.
	 * Examples and documentation: https://github.com/maaaaark/bcSwipe
	 *
	 * Licensed under the MIT license.
	 */
	$.fn.bcSwipe = function(settings) {
		var config = { threshold: 50 };
		if (settings) {
			$.extend(config, settings);
		}

		this.each(function() {
			var stillMoving = false;
			var start;

			if ('ontouchstart' in document.documentElement) {
				this.addEventListener('touchstart', onTouchStart, false);
			}

			function onTouchStart(e) {
				if (e.touches.length == 1) {
					start = e.touches[0].pageX;
					stillMoving = true;
					this.addEventListener('touchmove', onTouchMove, false);
				}
			}

			function onTouchMove(e) {
				if (stillMoving) {
					var x = e.touches[0].pageX;
					var difference = start - x;
					if (Math.abs(difference) >= config.threshold) {
						cancelTouch();
						if (difference > 0) {
							$(this).carousel('next');
						}
						else {
							$(this).carousel('prev');
						}
					}
				}
			}

			function cancelTouch() {
				this.removeEventListener('touchmove', onTouchMove);
				start = null;
				stillMoving = false;
			}
		});

		return this;
	};



	/*
	 *
	 *
	 *		Known Theme 
	 *		https://knowndesign.co/our-services/website-development/
	 */

	// The $(document).ready() will wait for full page load
	$(document).ready(function(){

		/*
		 *
		 *	Menu functionality
		 */
		//
		// Menu button
		$('.main-nav-menu-toggle').click(function(){
			$(this).toggleClass('nav-menu-toggle-inactive nav-menu-toggle-active');
			$('.menu-nav-menu.main-nav-menu').toggleClass('main-nav-menu-inactive main-nav-menu-active');
			$('.menu-nav-menu.main-nav-menu > li').slideToggle();
		});


		/*
		 *
		 *	Reset Serch Filter Form
		 */	
		// Add dropdown icons		
		$( '.archive .pge-sctn.dntns-usg .grph-key p' ).prepend( '<i class="fas fa-square icn"></i>');
		$( '.menu-nav-menu.main-nav-menu>li>a' ).append( '<i class="fas fa-chevron-down icn"></i>');


		/*
		 *
		 *	MatchHeight
		 */	
    	$('.pge-sctn.ftrd-itms.ftrd-itms-main>.pge-sctn-innr.prdfnd-pckgs>.row .blck-txt').matchHeight();
    	$('.pge-sctn.archv .package .blck-txt').matchHeight();

		/*
		 *
		 *	Bootstrap
		 */
		 //
		//	Carousel
		$('.carousel').bcSwipe({ threshold: 50 });
    		
	});
	

})(jQuery);


