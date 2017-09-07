window.onload = function() {

	// Lily's Custom Dropdown
	var firstLIValue = $('#lily-drop-down-subject > li > span').text();
	$('.lily-drop-down').on('click', function() {
		$(this).toggleClass('lily-drop-down-is-open');
	});

	$('.lily-drop-down').on('mouseleave', function() {
		$(this).removeClass('lily-drop-down-is-open');
	});

	$('.lily-drop-down ul li').on('click', function() {
		var fieldValue   = $(this).text();
		var targetField  = $(this).closest('.lily-drop-down').attr('data-target');
		var firstLITag   = $(this).closest('.lily-drop-down').find('li > span');

		$(targetField).val(fieldValue);
		firstLITag.html(firstLIValue + ': ' + '<small>' + fieldValue + '</small>');
	});

	// Contact form 7's Custom Loader

	var el = $('.wpcf7 form');
	var submitButton = el.find('.lily-button');
	var contactFormMessage = $('#lily-contact-form-message');
	$('.wpcf7 form').on('submit', function(e) {
		$('#lily-drop-down-subject > li span').removeClass('wpcf7-not-valid');
		submitButton.addClass('lily-spinner-start');
	});

	// Contact Form 7's Events
	$(".wpcf7").on('wpcf7:invalid', function(event){
		submitButton.removeClass('lily-spinner-start');

		if ($('#lily-subject').hasClass('wpcf7-not-valid')) {
			$('#lily-drop-down-subject > li span').addClass('wpcf7-not-valid');
		}
	});

	$(".wpcf7").on('wpcf7:spam', function(event){
		submitButton.removeClass('lily-spinner-start');
	});

	$(".wpcf7").on('wpcf7:mailsent', function(event){
		submitButton.removeClass('lily-spinner-start');
	});

	$(".wpcf7").on('wpcf7:mailfailed', function(event){
		submitButton.removeClass('lily-spinner-start');
	});

	$(".wpcf7").on('wpcf7:submit', function(event){
		submitButton.removeClass('lily-spinner-start');
	});

	// Google Map
	var $latitude  = 36.095315,
		$longitude = -80.277522,
		$mapZoom     = 15,
		$markerURL   = $('#map-marker-url').attr('data-map-marker');

	var	$main_color = '#231f20',
		$saturation = -100,
		$brightness = 50;

	var markersArray = [
		['USA', 36.095315, -80.277522]
	];

	// style of the map
	var style = [
		{
			// set saturation for the labels on the map
			elementType: 'labels',
			stylers: [
				{ saturation: $saturation }
			]
		},
		{
			// poi stands for point of interest - don't show these lables on the map
			featureType: 'poi',
			elementType: 'labels',
			stylers: [
				{ visibility: 'off' }
			]
		},
		{
			// don't show highways labels on the map
			featureType: 'road.highway',
			elementType: 'labels',
			stylers: [
				{ visibility: 'off' }
			]
		},
		{
			// don't show local road lables on the map
			featureType: 'road.local',
			elementType: 'labels.icon',
			stylers: [
				{ visibility: 'off' }
			]
		},
		{
			// don't show arterial road labels on the map
			featureType: 'road.arterial',
			elementType: 'labels.icon',
			stylers: [
				{ visibility: 'off' }
			]
		},
		{
			// don't show road labels on the map
			featureType: 'road',
			elementType: 'geometry.stroke',
			stylers: [
				{ visibility: 'off' }
			]
		},
		// style different elements on the map
		{
			featureType: 'transit',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'poi',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'poi.government',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'poi.sport.complex',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'poi.attraction',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'poi.business',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'transit',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'transit.station',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'landscape',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'road',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'road.highways',
			elementType: 'geometry.fill',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		},
		{
			featureType: 'water',
			elementTypee: 'geometry',
			stylers: [
				{ hue: $main_color },
				{ visibility: 'on' },
				{ lightness: $brightness },
				{ saturation: $saturation }
			]
		}
	];

	// set google map options
	var mapOptions = {
		center: new google.maps.LatLng($latitude, $longitude),
		/**
		 * The above line is necessary when we've multiple markers,
		 * this `map.fitBounds(bounds);` is used for automatically
		 * center when we have multiple markers
		 */
		zoom: $mapZoom,
		panControl: false,
		zoomControl: false,
		mapTypeControl: false,
		streetViewControl: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false,
		styles: style
	}

	// initialize the map
	var map = new google.maps.Map(document.getElementById('map-wrap'), mapOptions);
	var bounds = new google.maps.LatLngBounds();
	// Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

	// SINGLE MARKER
	// add a custom marker to the map
	// var marker = new google.maps.Marker({
	// 	position: new google.maps.LatLng($latitude, $longitude),
	// 	map: map,
	// 	visible: true,
	// 	icon: $markerURL
	// });
	// MULTIPLE MARKERS
	for( i = 0; i < markersArray.length; i++ ) {
		// Set all markers
		var position = new google.maps.LatLng(markersArray[i][1], markersArray[i][2]);
		bounds.extend(position);
		marker = new google.maps.Marker({
			position: position,
			map: map,
			visible: true,
			icon: $markerURL
		});

		// Set info window
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infoWindow.setContent(markersArray[i][0]);
				infoWindow.open(map, marker);
			}
		}));

		// Automatically center the map fitting all markers on the screen
		map.fitBounds(bounds);
	}

	// add custom buttons for the zoon-in/zoon-out on the map
	function CustomZoomControl(controlDiv, map) {
		// grab th zoom elements from the DOM and insert them in the map
		var controlZoomIn  = document.getElementById('map-zoom-in'),
			controlZoomOut = document.getElementById('map-zoom-out');

		controlDiv.appendChild(controlZoomIn);
		controlDiv.appendChild(controlZoomOut);

		// Setup the click event listeners and zoom-in or out according
		// to the clicked element
		google.maps.event.addDomListener(controlZoomIn, 'click', function() {
			map.setZoom(map.getZoom()+1)
		});

		google.maps.event.addDomListener(controlZoomOut, 'click', function() {
			map.setZoom(map.getZoom()-1)
		});
	}

	var zoomControlDiv = document.createElement('div');
	var zoomControl    = new CustomZoomControl(zoomControlDiv, map);

	// insert the zoom div on the top left of the map
	map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);

	// set z-index of zoom control
	setTimeout(function() {
		var zoomControlWrap = $('#map-zoom-in').parent('div');
		zoomControlWrap.css('position', 'static')
		map.setZoom($mapZoom);
	}, 1000);
}