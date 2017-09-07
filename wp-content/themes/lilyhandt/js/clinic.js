var beforeAfterSlidesToShow = 2;
var slideTime    = 5;
var easingSpeed  = 300;
var testimonialsToShow = 3;

window.onload = function() {
	// Facilities Slider
	var slideItems   = $('.slider-items').find('.slide-item');
	var totalSlides  = $('.slider-items').find('.slide-item').length;

	if(jQuery().slick) {
		$('#facilities-slider').slick({
		    infinite: true,
		    dots: false,
		    arrows: true,
		    speed: 500,
		    fade: true,
		    cssEase: 'linear',
		    arrows: false,
		    autoplay: true,
		    autoplaySpeed: 3000
		});

		var beforeAfterSlidesTotal = $('#facilities-slider .slide-item:not(.slick-cloned)').length;
		
		if(totalSlides >= 2) {
			$('#facilities-slider').addClass('has-arrows');

			$('#facilities-slider-nav-left').on('click', function(e) {
				e.preventDefault();
				$('#facilities-slider').slick('slickPrev');
			});

			$('#facilities-slider-nav-right').on('click', function(e) {
				e.preventDefault();
				$('#facilities-slider').slick('slickNext');
			});
		}
	}

	// After/Before Slick Slider
	if(jQuery().slick) {
		$('#lh-before-after').slick({
		    infinite: true,
		    slidesToShow: beforeAfterSlidesToShow,
		    slidesToScroll: beforeAfterSlidesToShow,
		    arrows: true,
		    fade: false,
		    arrows: false,
		    responsive: [
		    	{
		    		breakpoint: 768,
		    		settings: {
		    			slidesToShow: 1,
		    			slidesToScroll: 1
		    		}
		    	}
		    ]
		});

		var beforeAfterSlidesTotal = $('.lh-before-after-item:not(.slick-cloned)').length;
		
		if(beforeAfterSlidesToShow < beforeAfterSlidesTotal) {
			$('.lh-before-after-nav').addClass('has-arrows');

			$('#lh-before-after-previous').on('click', function(e) {
				e.preventDefault();
				$('#lh-before-after').slick('slickPrev');
			});

			$('#lh-before-after-next').on('click', function(e) {
				e.preventDefault();
				$('#lh-before-after').slick('slickNext');
			});
		}
	}

	// After/Before Slick Slider
	if(jQuery().slick) {
		$('#lh-testimonials').slick({
		    infinite: true,
		    slidesToShow: testimonialsToShow,
		    slidesToScroll: testimonialsToShow,
		    arrows: true,
		    fade: false,
		    arrows: false,
		    responsive: [
		    	{
		    		breakpoint: 1250,
		    		settings: {
		    			slidesToShow: 2,
		    			slidesToScroll: 2
		    		}
		    	},
		    	{
		    		breakpoint: 768,
		    		settings: {
		    			slidesToShow: 1,
		    			slidesToScroll: 1
		    		}
		    	}
		    ]
		});

		var beforeAfterSlidesTotal = $('.lh-testimonial-item:not(.slick-cloned)').length;
		
		if(testimonialsToShow < beforeAfterSlidesTotal) {
			$('.lh-testimonials-nav').addClass('has-arrows');

			$('#lh-testimonials-previous').on('click', function(e) {
				e.preventDefault();
				$('#lh-testimonials').slick('slickPrev');
			});

			$('#lh-testimonials-next').on('click', function(e) {
				e.preventDefault();
				$('#lh-testimonials').slick('slickNext');
			});
		}
	}
}