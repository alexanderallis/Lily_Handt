$(document).ready(function() {
	setTimeout(function() {
		$(document).on('click', '.sub-menu a', function(event) {
			var anchor    = $(this).attr('href');
			var target    = $(anchor.substring(anchor.indexOf('#')));
			if (target.length) {
				event.preventDefault();
		        $('html, body').animate({ scrollTop: target.offset().top }, 1000);
		    }
	    });
	}, 1000);
});