<?php 
session_start();
		require 'conn/koneksi.php';
		require 'layer/rupiah.php';
		$base_url = "http://kristomoyo.com/leaflet";
		if(isset($_POST['user'])){
			$_SESSION["username"] = $_POST['user'];
		}else if($_SESSION["username"]!= null){
			//do nothing
		}else{
			echo ("<script LANGUAGE='JavaScript'>
    window.alert('Oops kasih tau nama kamu dong, ;)');
    window.location.href='".$base_url."';
    </script>");
		}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter</title>
    <title>Propertikuuu - webgis</title>
    <h3> Silahkan Cari Kategori</h3>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
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
			height: 400px;
            padding: 20px;
		}
	</style>

</head>
<body><?php require 'header.php'?>
<div class="container">
            <section class="section">
                <div class="card">
    <form action="filter2.php" method="get">
        <label>Cari :</label>
        <input type="hidden" name="cari" value="true">
        <input type="text" name="Alamat_properti" placeholder="alamat">
        <input type="text" name="Harga" placeholder="Harga">
        <input type="text" name="Luas" placeholder="Luas">
        <input type="text" name="Jarak" placeholder="Jarak Ke Pusat Kota">
        <input type="text" name="Jumlah_cicil" placeholder="Jumlah Cicil">
        <input type="text" name="Tahun_bangun" placeholder="Tahun bangun">
        <input type="submit" value="Cari">
    </form>
    <?php
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        //echo "<b>Hasil Pencarian : ".$cari."</b>";
    }
    ?>
        <br/>
                    <div id="map"></div>
        </div>
        </section>
        </div>
        <?php require 'footer.php'?>
        <?php
        if(isset($_GET['cari'])){
            $alamat = "%".$_GET['Alamat_properti']."%";
            $harga = "%".$_GET['Harga']."%";
            $luas = "%".$_GET['Luas']."%";
            $jarak = "%".$_GET['Jarak']."%";
            $jumlahCicil = "%".$_GET['Jumlah_cicil']."%";
            $tahunBangun = "%".$_GET['Tahun_bangun']."%";
            // $data = mysql_query("SELECT PropertiName, NamaProperti, Alamat_properti ,Harga, Luas, Jarak, Jumlah_cicil, Tahun_bangun FROM jenis_properti a JOIN properti b on a.PropertiID=b.PropertiID WHERE Harga like '%".$cari."%' OR Luas like '%".$cari."%' OR Jarak like '%".$cari."%' OR Jumlah_cicil like '%".$cari."%' OR Tahun_bangun like '%".$cari."%'");
            $db = $mysqli->prepare("SELECT * FROM jenisProperti a JOIN properti b on a.JenisID=b.JenisID WHERE Alamat_properti LIKE ? AND Harga like ? AND Luas like ? AND Jarak like ? AND Jumlah_cicil like ? AND Tahun_bangun like ? ");
            $db->bind_param("ssssss",$alamat,$harga,$luas,$jarak,$jumlahCicil,$tahunBangun);
            var_dump($db);
            $alamat = "%".$_GET['Alamat_properti']."%";
            $harga = "%".$_GET['Harga']."%";
            $luas = "%".$_GET['Luas']."%";
            $jarak = "%".$_GET['Jarak']."%";
            $jumlahCicil = "%".$_GET['Jumlah_cicil']."%";
            $tahunBangun = "%".$_GET['Tahun_bangun']."%";
            $db->execute();

            $cos = $db->get_result();
            $res = $cos->fetch_all(MYSQLI_ASSOC);
        } else{
            $jenis = "asdasd";
            $db = $mysqli->prepare("SELECT * FROM properti a join jenisProperti b on a.JenisID=b.JenisID where a.PropertiID!=?");
            $db->bind_param("s",$jenis);
            $db->execute();
            
            $cos = $db->get_result();
            $res = $cos->fetch_all(MYSQLI_ASSOC);
        }
    
        ?>
        <script>
            	var yellowIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
                });
                var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

	// basemap	
	var dark  = L.tileLayer(mbUrl, {id: 'mapbox/dark-v10', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
		streets  = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
		grayscale   = L.tileLayer(mbUrl, {id: 'mapbox/light-v10', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
		outdoors  = L.tileLayer(mbUrl, {id: 'mapbox/outdoors-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
		satellite  = L.tileLayer(mbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
		satelliteStreet  = L.tileLayer(mbUrl, {id: 'mapbox/satellite-streets-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
		comic  = L.tileLayer('http://a.tiles.mapbox.com/v4/mapbox.comic/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {attribution: mbAttr});
		light  = L.tileLayer('http://a.tiles.mapbox.com/v4/mapbox.light/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {attribution: mbAttr});
		pencil  = L.tileLayer('http://a.tiles.mapbox.com/v4/mapbox.pencil/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {attribution: mbAttr});
		emerald  = L.tileLayer('http://a.tiles.mapbox.com/v4/mapbox.emerald/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {attribution: mbAttr});
		pirates  = L.tileLayer('http://a.tiles.mapbox.com/v4/mapbox.pirates/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {attribution: mbAttr});
		bike  = L.tileLayer('http://a.tiles.mapbox.com/v4/mapbox.run-bike-hike/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {attribution: mbAttr});
		wheatpaste  = L.tileLayer('http://a.tiles.mapbox.com/v4/mapbox.wheatpaste/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {attribution: mbAttr});
		streetsbasic  = L.tileLayer('http://a.tiles.mapbox.com/v4/mapbox.streets-basic/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {attribution: mbAttr});
		highcontrast  = L.tileLayer('http://a.tiles.mapbox.com/v4/mapbox.high-contrast/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {attribution: mbAttr});


		// inisialisasi atau pemanggilan peta
	

	// variabel penampung baselayers untuk controller di tampilan peta 
	var baseLayers = {
		"Abu": grayscale,
		"Jalan": streets,
		"Gelap": dark,
		"Out": outdoors,
		"Satelit": satellite,
		"Satelit-2": satelliteStreet,
		"Comic": comic,
		"Light": light,
		"Pencil": pencil,
		"Emerald": emerald,
		"Pirates": pirates,
		"Bike": bike,
		"Wheatpaste": wheatpaste,
		"Streetsbasic": streetsbasic,
		"Highcontrast": highcontrast
	};

                <?php
                echo "var filter= L.layerGroup();\n";
                $count = 0;
                foreach ($res as $key => $sult) {
                    echo "var part_filter_".$count." = '<h6 class=\"".$sult['NamaJenis']."\">Jenis Properti : ".$sult['NamaJenis']."</h6>'+
                    '<h4 class=\"title\">".$sult['NamaProperti']."</h4>'+
                    '<p>Alamat Properti : ".$sult['Alamat_properti']."</p>' +
                    '<p>Harga : ".rupiah($sult['Harga'])."</p>' +
                    'Info Lebih lanjut :'+
                    '<a href=\"detail.php?jenis=".$sult['JenisID']."&properti=".$sult['PropertiID']."\">Detail properti</a>'\n";
                
                    
                    echo "var customOptions_filter_".$count." =
                        {
                        'maxWidth': '300',
                        'maxheight': '300',
                        'className' : 'custom_filter_".$count,"'
                        }\n";
                    echo "L.marker([".$sult['Latitude'].",".$sult['Longitude']."], {icon: yellowIcon}).bindPopup(part_filter_".$count,", customOptions_filter_".$count.").addTo(filter);";
                
                    $count++;
                }
                
                ?>

var map = L.map('map', {
		center: [-7.9089297, 112.5992162],
		zoom: 14.25,
		layers: [streets, filter]
	});
	map.flyTo([-7.9089297, 112.5992162], 14.25);

                L.control.layers(baseLayers).addTo(map);
        </script>


</body>
</html>
