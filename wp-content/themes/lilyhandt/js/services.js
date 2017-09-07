window.onload = function() {
	adjustOffsetColumn();
}

window.onresize = function() {
	adjustOffsetColumn();
}

function adjustOffsetColumn() {
	var windowSize = window.matchMedia('(min-width: 768px)');

	if (windowSize.matches) {
	    /**
	     * ALL LEFT GRID PADDING
	     */
	    $('.offset-left-col-wrap').css('padding-left', $('.footer-gridpad').offset().left + 'px');

	    /**
	     * LAST SECTION
	     */
	    $('.offset-left-col-wrap.lily-i-m-in-grid').css('padding-right', $('.footer-gridpad').offset().left + 'px');
	    var gridRowWidth = $('.lily-i-m-in-grid').width();

	    // Set left grid width equal to all other left grid & remove right side padding
	    $('.offset-left-col-wrap.lily-i-m-in-grid .offset-left-col').css({
	    	width: $('.offset-left-col-text-box').width(),
	    	paddingRight: 0
	    });

	    var leftColWidth = $('.offset-left-col-wrap.lily-i-m-in-grid .offset-left-col').width();
	    var serviceConsultation = $('.service-consultation');

	    serviceConsultation.css({
	    	width: gridRowWidth - leftColWidth,
	    	paddingLeft: '25px'
	    });
	} else {
		$('.offset-left-col-wrap').css('padding-left', 0);
		$('.offset-left-col-wrap.lily-i-m-in-grid').css({
			paddingLeft: 0,
			paddingRight: 0
		}).find('.offset-left-col').css({
			paddingRight: 0
		});
	}
}