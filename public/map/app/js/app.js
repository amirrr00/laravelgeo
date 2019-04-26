/**
 * © Map.ir | Example Projects - Get LatLng
 * https://map.ir - support@map.ir
 * 
 * Example Project Showing how to get latlng from a user selected (clicked) point.
 * 
 */


$(document).ready(function () {

	// Initial map instance
	const map = $.sMap({
		mode: 'test',
		element: '#map',
		presets: {
			latlng: {
				lat: 35.68184060244455,
				lng: 51.41464233398438,
			},
			zoom: 16,
		},
		after: afterMapInitialized
	});


    $.sMap.userLocation.implement({
        history: true,
    });


    // Add base Layer to sMap plugin
	$.sMap.layers.static.build({
		layers: {
			base: {
				default: {
					server: 'https://map.ir/shiveh',
					layers: 'Shiveh:ShivehGSLD256',
					format: 'image/png',
					i18n: 'custom-baselayer-default',
				},
			},
		},
	});

	//  Initialize the marker feature
	$.sMap.features();

	// What is called after map instance is created
	function afterMapInitialized() {
			// Change cursor to a marker icon (uneccessary)
			// So The curser be a Marker to represent adding marker
		$('.leaflet-container').addClass("cursor-marker");

		map.on('click', (event) => {

			// Add marker to clicked position
			$.sMap.features.marker.create({
				name: 'user-location',

				latlng: event.latlng,
				popupOpen: true,
				draggable: true,
				toolbar: []
			});

			// logging latlng to console
			console.log(event.latlng);

			$('#latitude').val(event.latlng.lat);
			$('#longitude').val(event.latlng.lng);

		});
	
	}

});
