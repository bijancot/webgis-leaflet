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
                    <div class="card-content">
    <form action="filter2.php" method="get">
        <h2 class="title">Filter search</h2></br>
        <input type="hidden" name="cari" value="true">
        <div class="columns">
            <div class="column is-12">
            <div class="field">
                <label class="label">Alamat Properti</label>
                <input type="text" class="input medium" name="Alamat_properti" placeholder="alamat">    
            </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">
                    <label class="label">Harga Properti</label>
                    <div class="select">
                    <select name="harga">
                        <option value="<50">Kurang dari 50jt</option>
                        <option value="50sd300">diantara 50jt s.d 300jt</option>
                        <option value=">300">Lebih dari 300jt</option>
                    </select>
                    </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Luas Properti</label>
                    <div class="select">
                    <select name="luas">
                        <option value="<60">Kurang dari 60m2</option>
                        <option value="60sd200">diantara 60m2 s.d 200m2</option>
                        <option value=">200">Lebih dari 200m2</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Jarak Properti ke pusat kota</label>
                    <div class="select">
                    <select name="jarak">
                        <option value="<5">Kurang dari 5KM</option>
                        <option value="5sd20">diantara 5KM s.d 20KM</option>
                        <option value=">20">Lebih dari 20KM</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Jumlah Cicilan</label>
                    <div class="select">
                    <select name="jumlah_cicil">
                        <option value="0">Tidak ada</option>
                        <option value="0sd20">sampai dengan 20x</option>
                        <option value=">20">Lebih dari 20x</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Tahun Bangunan</label>
                    <div class="select">
                    <select name="tahun">
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="column is-6"><input class="button is-primary is-fullwidth" type="submit" value="Cari"></div>
        </div>
        
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
        </div>
        </section>
        </div>
        <?php require 'footer.php'?>
        <?php
        if(isset($_GET['cari'])){
            $alamat = "%".$_GET['Alamat_properti']."%";

            if($_GET['harga']=="<50"){
                $qharga = "< 50000000";
            }else if($_GET['harga']=="50sd300"){
                $qharga = "between 50000000 and 300000000";
            }else if($_GET['harga']==">300"){
                $qharga = ">= 300000";
            }

            if($_GET['luas']=="<60"){
                $qluas = "< 60";
            }else if($_GET['luas']=="60sd200"){
                $qluas = "between 60 and 200";
            }else if($_GET['luas']==">200"){
                $qluas = ">= 200";
            }

            if($_GET['jarak']=="<5"){
                $qjarak = "< 5";
            }else if($_GET['jarak']=="5sd20"){
                $qjarak = "between 5 and 20";
            }else if($_GET['jarak']==">20"){
                $qjarak = ">= 20";
            }

            if($_GET['jumlah_cicil']=="0"){
                $qcicil = "<= 0";
            }else if($_GET['jumlah_cicil']=="0sd20"){
                $qcicil = "between 0 and 20";
            }else if($_GET['jumlah_cicil']==">20"){
                $qcicil = ">= 20";
            }
            $tahun = $_GET['tahun'];
            // $data = mysql_query("SELECT PropertiName, NamaProperti, Alamat_properti ,Harga, Luas, Jarak, Jumlah_cicil, Tahun_bangun FROM jenis_properti a JOIN properti b on a.PropertiID=b.PropertiID WHERE Harga like '%".$cari."%' OR Luas like '%".$cari."%' OR Jarak like '%".$cari."%' OR Jumlah_cicil like '%".$cari."%' OR Tahun_bangun like '%".$cari."%'");
            // $db = $mysqli->prepare("SELECT * FROM jenisProperti a JOIN properti b on a.JenisID=b.JenisID WHERE Alamat_properti LIKE ? AND Harga $qarga AND Luas like ? AND Jarak like ? AND Jumlah_cicil like ? AND Tahun_bangun like ? ");
            $db = $mysqli->prepare("SELECT * FROM jenisProperti a JOIN properti b on a.JenisID=b.JenisID WHERE Alamat_properti LIKE ? AND Harga $qarga AND Luas $qluas AND Jarak $qjarak AND Jumlah_cicil $qcicil AND Tahun_bangun = ?");
            $db->bind_param("s",$alamat);
            var_dump($db);
            $tahun = $_GET['tahun'];
            $alamat = "%".$_GET['Alamat_properti']."%";
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
