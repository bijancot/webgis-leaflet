	<?php 
		require 'conn/koneksi.php';
	?>
<html>
<head>
	
	<title>Propertikuuu - webgis</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>


	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		#map {
			width: 100%;
			height: 100vh;
		}
		.column, .columns{
			min-width: 100px;
			min-height: 70px;
			max-width: 250px;
			max-height: 120px;
		}
	</style>

	
</head>
<body>

<div id='map'></div>

<script>
	/*contoh custom marker untuk leaflet sumber : https://github.com/pointhi/leaflet-color-markers 
	untuk custom icon bisa pakai png lain tinggal ganti 'iconUrl' & shadowUrl */

	var yellowIcon = new L.Icon({
	iconUrl: 'https://github.com/pointhi/leaflet-color-markers/blob/master/img/marker-icon-2x-yellow.png',
	shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
	iconSize: [25, 41],
	iconAnchor: [12, 41],
	popupAnchor: [1, -34],
	shadowSize: [41, 41]
	});



	
	// map.setView(new L.LatLng(-7.9786395, 112.5617424), 8);
	// variabel layergroup
	/* Contoh custom value untuk popup leafletjs, ini juga terhubung dengan bulmacss (untuk reponsive saja) 
	class columns & column tidak bisa dirubah karena bawaan, height bisa dicustom (lihat baris 26-31)
	*/
	var part_kav = '<div class="columns">'+
		'<div class="column">' +
		'<img src = "https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/91400513_1553639021452975_5524976870795247616_n.png?_nc_cat=110&_nc_sid=730e14&_nc_eui2=AeF3Z5XcreiARhaAIR3lFBk8i4S9cKEyQ4KLhL1woTJDgjW1y9_p-osrlqnLwrxBLxlX95MDOg9MvMSQ2wqcufoN&_nc_ohc=w6KoWgus7VAAX-dK1mL&_nc_ht=scontent-sin6-2.xx&oh=1b5cea5b065fe627c23d040f57ab790a&oe=5F166FF5"/>' +
		'</div>'+
		'<div class="column">B</div>'+
	'</div>';

	/* custom option untuk popup ini bawaan dari leaflet tapi bisa dirubah */
	var customOptions_kav =
        {
        'maxWidth': '500',
        'className' : 'custom_kav'
        }

	// menambahkan marker
	// L.marker([-7.900509, 112.6069513]).bindPopup(part, customOptions).addTo(kavling);
	// L.marker([-7.905609, 112.6122395]).bindPopup(part, customOptions).addTo(kavling);
	// L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(kavling);
	// L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(kavling);
	
	<?php 
			require 'layer/rmhBersubsidi.php';
			require 'layer/apart.php';
			require 'layer/ellite.php';
			require 'layer/rusun.php';
			require 'layer/tanahKavling.php';
			require 'layer/villa.php';
	?>

	var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

	// basemap	
	var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
		streets  = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});


		// inisialisasi atau pemanggilan peta
		var map = L.map('map', {
		center: [-7.9089297, 112.5992162],
		zoom: 14.25,
		layers: [streets, rmhBersubsidi, apart, villa, rusun, tnhKavling, ellite]
	});
	map.flyTo([-7.9089297, 112.5992162], 14.25);

	// variabel penampung baselayers untuk controller di tampilan peta 
	var baseLayers = {
		"Abu": grayscale,
		"Jalan": streets
	};

	// variabel penampung overlay (layer custom) untuk controller di tampilan peta 
	var overlays = {
		"Rumah Bersubsidi": rmhBersubsidi,
		"Apartement": apart,
		"Villa" : villa,
		"Rumah Susun" : rusun,
		"Tanah Kavling" : tanahKavling,
		"Perumahan Ellite" : ellite
	};

	// memasukkan semua controller ke peta
	L.control.layers(baseLayers, overlays).addTo(map);
</script>

</body>
</html>


<!-- Semangat Guyss -->
