window.onload = function() {
	// FIRST OPTION IN DROPDOWN BOX (value is -1)
	var selectItems = [
		{title: 'location', id: '#birs_appointment_location'},
		{title: 'service', id: '#birs_appointment_service'},
		{title: 'provider', id: '#birs_appointment_staff'},
		{title: 'title', id: '#birs_client_title'}
	];

	$.each(selectItems, function(item, value) {
		var $select = $(value.id);
		$select.prepend(`<option value="-1" selected>${value.title}</option>`);
	});

	// CREATED PLACEHOLDER
	$('#birs_client_name_first').attr('placeholder', 'first name');
	$('#birs_client_name_last').attr('placeholder', 'last name');
	$('#birs_appointment_notes').attr('placeholder', 'notes');
	$('#birs_client_email').attr('placeholder', 'email');
	$('#birs_client_phone').attr('placeholder', 'phone');

	// FORM SUBMIT
	var ajaxing = null;
	$('#birs_book_appointment').on('click', function() {
		var el = $(this);
		el.closest('div').addClass('lily-spinner lily-spinner-start spinner-wrap');
		$('.birs_field_content').removeClass('birch-has-error');
		ajaxing = true;
		birtchFormSubmitted();
	});

	// Hide error for time on date change
	$('#birs_appointment_date').on('change', function() {
		$('.birs_appointment_time').find('birs_field_content').removeClass('birch-has-error');
	});

	function birtchFormSubmitted() {
		var formIsLoading = setInterval(function() {
			if (($('#birs_please_wait').css('display') == 'none') && ajaxing) {
				ajaxing = false;
				clearInterval(formIsLoading);
				$('#birs_book_appointment').closest('div').removeClass('lily-spinner lily-spinner-start spinner-wrap');
				validationMessages();
			}
		}, 10);
	}

	function validationMessages() {
		var errorMessages = $('.birs_error');

		if (errorMessages.length) {
			$.each(errorMessages, function(index, item) {
				var itemID = $(item).attr('id'); // Error message
				if (itemID.length && $(item).css('display') == 'block') {
					var targetElID = itemID.replace('_error', ''); // This will be highlighted if it has an error message.
					var targetEl = $('.' + targetElID);
					targetEl.find('.birs_field_content').addClass('birch-has-error');
					console.log(targetElID + " " + itemID);
				}
			});
		}
	}

	// TOGGLE SCREENREADER FOR HIDDEN ELEMENTS
	//toggleScreenreader();
	// function toggleScreenreader() {
	// 	var allEls = $('#birs_appointment_form ul li *');
	// 	$.each(allEls, function(index, item) {
	// 		if($(item).css('display') == 'none') {
	// 			$(item).addClass('lily-screen-reader');
	// 		} else {
	// 			$(item).removeClass('lily-screen-reader');
	// 		}
	// 	});
	// }

	// $.each(selectItems, function(item, value) {
	// 	var $select = $(value);
	// 	var fieldName = value.substring(1, value.length);
	// 	var label = $('li.' + fieldName).find('label').text(); // Getting labels
	// 	var $list = $('<ul />');

	// 	$('li.' + fieldName).find('label').remove(); // Remove labels
	// 	$list.append('<li><span data-text="' + label + '">' + label + '</span><ul>');
	// 	$select.find('option').each(function(){
	//     	$list.find('li ul').append('<li data-value="' + $(this).val() + '">' + $(this).text() + '</li>');
	// 	});
	// 	$list.append('</ul></li>');
	// 	$list.addClass('lily-drop-down');
	// 	$list.attr('data-target', value);
	// 	$list.find('li ul').append('<li class="lily-screen-reader"><input type="hidden" name="' + fieldName + '" value="" id="' + value + '" /></li>');

	// 	$select.after( $list ).remove();
	// });


	// Lily's Custom Dropdown
	// $('.lily-drop-down').on('click', function() {
	// 	$(this).toggleClass('lily-drop-down-is-open');
	// });

	// $('.lily-drop-down').on('mouseleave', function() {
	// 	$(this).removeClass('lily-drop-down-is-open');
	// });

	// $('.lily-drop-down ul li').on('click', function() {
	// 	var firstLIValue = $(this).closest('.lily-drop-down').find('span').attr('data-text');
	// 	var fieldValue   = $(this).text();
	// 	var unqValue     = $(this).attr('data-value');
	// 	console.log(unqValue);
	// 	var targetField  = $(this).closest('.lily-drop-down').attr('data-target');
	// 	var firstLITag   = $(this).closest('.lily-drop-down').find('li > span');

	// 	$(targetField).val(unqValue);
	// 	firstLITag.html(firstLIValue + ': ' + '<small>' + fieldValue + '</small>');
	// });
}