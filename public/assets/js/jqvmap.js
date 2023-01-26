$(function(e) {
	'use strict'
	//world map
	if ($('#world-map-gdp').length) {
		$('#world-map-gdp').vectorMap({
			map: 'world_en',
			backgroundColor: null,
			color: '#ffffff',
			hoverOpacity: 0.7,
			selectedColor: '#ec296b',
			enableZoom: true,
			showTooltip: true,
			values: sample_data,
			scaleColors: ['#3366ff', '#4801ff'],
			normalizeFunction: 'polynomial'
		});
	}
	//us map
	if ($('#usa_map').length) {
		$('#usa_map').vectorMap({
			map: 'usa_en',
			backgroundColor: null,
			color: '#ffffff',
			hoverOpacity: 0.7,
			selectedColor: '#ec296b',
			enableZoom: true,
			showTooltip: true,
			values: sample_data,
			scaleColors: ['#ff3d70', '#4801ff'],
			normalizeFunction: 'polynomial'
		});
	}
	if ($('#german').length) {
		$('#german').vectorMap({
			map: 'germany_en',
			backgroundColor: null,
			color: '#ffffff',
			hoverOpacity: 0.7,
			selectedColor: '#ec296b',
			enableZoom: true,
			showTooltip: true,
			values: sample_data,
			scaleColors: ['#136dba', '#4801ff'],
			normalizeFunction: 'polynomial'
		});
	}
	if ($('#russia').length) {
		$('#russia').vectorMap({
			map: 'russia_en',
			backgroundColor: null,
			color: '#ffffff',
			hoverOpacity: 0.9,
			selectedColor: '#17a2b8',
			scaleColors: ['#17a2b8', '#4801ff'],
			enableZoom: true,
			showTooltip: true,
			values: sample_data,
		});
	}
});