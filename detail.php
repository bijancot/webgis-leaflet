<?php
session_start();
require 'conn/koneksi.php';
require 'layer/rupiah.php';
$jenisProperti = $_GET['jenis'];
$idProperti = $_GET['properti'];
if($_SESSION["username"]!= null){
    //do nothing
}else{
    $base_url = "http://kristomoyo.com/leaflet";
    echo ("<script LANGUAGE='JavaScript'>
window.alert('Oops kasih tau nama kamu dong, ;)');
window.location.href='".$base_url."';
</script>");
}


$jenis = $jenisProperti;
$db = $mysqli->prepare("SELECT * FROM properti a join foto_tabel b on a.PropertiID=b.PropertiID join jenisProperti c on a.JenisID=c.jenisID where a.PropertiID= ?");
$db->bind_param("s",$idProperti);
$db->execute();

$cos = $db->get_result();
$res = $cos->fetch_all(MYSQLI_ASSOC);


$pho;
$i=0;
foreach ($res as $key => $value) {
   $pho[$i]=$value['Foto'];
    $i++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
			height: 100vh;
		}
	</style>

</head>
<body>
<?php require 'header.php'?>
	<div class="container">
		<section class="section">
			<div class="card">
                <?php foreach ($res as $key => $sult) {?>
				<div class="card-content">
					<h6><?= $sult['NamaJenis']?></h6>
				  
					<div class="columns">
						<div class="column">
							<p class="title">
                                <?= $sult['NamaProperti']?>
							</p>
							<p class="subtitle">
								<?= $sult['Alamat_properti']?>
							</p>
						</div>
						<div class="column ">
							<p class="title has-text-right">
                                <?= rupiah($sult['Harga']);?>
							</p>
						</div>
					</div>
				 
				  <div class="tile is-ancestor">
					<div class="tile is-4 is-vertical is-parent">
					  <div class="tile is-child box">
						<img src="http://kristomoyo.com/leaflet<?=$pho[0]?>" class="image" alt="foto properti #1">
					  </div>
					  <div class="tile is-child box">
                        <img src="http://kristomoyo.com/leaflet<?=$pho[1]?>" class="image" alt="foto properti #2">
					  </div>
					</div>
					<div class="tile is-parent">
					  <div class="tile is-child box">
                        <img src="http://kristomoyo.com/leaflet<?=$pho[2]?>" class="image" alt="foto properti #3">
					  </div>
					</div>
				  </div>
				  <br/>
				  <div class="content">
                      <div class="columns">
                          <diV class="column">
                          <table class="table">
                          <thead>
                            <tr>
                            <th>Atribut</th>
                            <th>nilai</th>
                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                <td>Alamat Properti</td>
                                <td><?=$sult['Alamat_properti'];?></td>
                              </tr>
                              <tr>
                                <td>Tahun Bangun</td>
                                <td><?php
                                if($sult['Tahun_bangun']== null){
                                    echo "-";
                                }else{
                                    echo $sult['Tahun_bangun'];
                                }
                                ?></td>
                              </tr>
                              <tr>
                                <td>Jumlah cicilan</td>
                                <td><?=$sult['Jumlah_cicil'];?></td>
                                
                              </tr>
                              <tr>
                                <td>Luas Bangunan</td>
                                <td><?=$sult['Luas'];?></td>
                              </tr>
                              <tr>
                                <td>Jarak Ke Pusat Kota</td>
                                <td><?=$sult['Jarak'];?></td>
                              </tr>
                              <tr>
                                <td>Harga</td>
                                <td><?= rupiah($sult['Harga'])?></td>
                              </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                            <th>Atribut</th>
                            <th>nilai</th>
                            </tr>
                          </tfoot>
                      </table>
                          </div>
                          <div class="column">
                            <div id="mapid"></div>
                          </div>
                      </div>
				  </div>
                </div>
                <div id="mapid"></div>
				<footer class="card-footer">
				  <p class="card-footer-item">
					<span>
					  <a class="button" href="https://api.whatsapp.com/send?phone=6282334059230&text=Halo%20saya%20butuh%20informasi%20lebih%20lanjut">Chat Whatsapp &nbsp;&nbsp;<i class="fab fa-whatsapp"></i></a>
					</span>
				  </p>
				  <p class="card-footer-item">
					<span>
					  <a class="button" href="tel:(+62) 923-3405-9230">Telpon Kami Sekarang &nbsp;<i class="fab fa-phone"></i></a>
					</span>
				  </p>
				</footer>
              </div>
                
		</section>
	</div>
<?php require 'footer.php'?>
</body>

<script>

	var mymap = L.map('mapid').setView([51.505, -0.09], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	L.marker([51.5, -0.09]).addTo(mymap)
		.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

	L.circle([51.508, -0.11], 500, {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(mymap).bindPopup("I am a circle.");

	L.polygon([
		[51.509, -0.08],
		[51.503, -0.06],
		[51.51, -0.047]
	]).addTo(mymap).bindPopup("I am a polygon.");


	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);

</script>
</html>
<?php break;}?>