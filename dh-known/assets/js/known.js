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
		$('.ste-hdr .tggl-bttn.nav-mnu-tggl').click(function(){
			$(this).toggleClass('tggl-bttn-open tggl-bttn-closed');
			$('.menu-nav-menu.main-nav-menu').toggleClass('nav-menu-open nav-menu-closed');
			$('.menu-nav-menu.main-nav-menu > li').slideToggle();
		});


		/*
		 *
		 *	MatchHeight
		 */	
    	$('.pge-sctn.ltst-prprts .blck-cntnt').matchHeight();
    	$('.pge-sctn.ltst-nws .blck-cntnt').matchHeight();
    	$('.blog .clmn-main .blck-cntnt').matchHeight();
    	$('.archive:not(.post-type-archive) .clmn-main .blck-cntnt').matchHeight();
    	// $('.search .clmn-main .blck-cntnt').matchHeight();
    	$('.txt-crsl .carousel-item').matchHeight();
    	$('.txt-crsl .carousel-caption').matchHeight();


		/*
		 *
		 *	JQ Social Sharer
		 */
		$("#scl-shrng-bttns a").jqSocialSharer();


		/*
		 *
		 *	Mobile Hover
		 */
		var mobileHover = function () {
			$('*').on('touchstart', function () {
			    $(this).trigger('hover');
			}).on('touchend', function () {
			    $(this).trigger('hover');
			});
		};
		mobileHover();


		/*
		 *
		 *	Bootstrap
		 */
		 //
		//	Carousel
		$('.carousel').bcSwipe({ threshold: 50 });


    		
	});
	

})(jQuery);


