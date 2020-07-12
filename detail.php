<?php

require 'conn/koneksi.php';
require 'layer/rupiah.php';
$jenisProperti = $_GET['jenis'];
$idProperti = $_GET['properti'];



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
                        <img src="http://kristomoyo.com/leaflet<?=$pho[2]?>" class="image is-16by9" alt="foto properti #3">
					  </div>
					</div>
				  </div>
				  <br/>
				  <div class="content">
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
                                <td><?=$sult['Tahun_bangun'];?></td>
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
				</div>
				<footer class="card-footer">
				  <p class="card-footer-item">
					<span>
					  View on <a href="https://twitter.com/codinghorror/status/506010907021828096">Twitter</a>
					</span>
				  </p>
				  <p class="card-footer-item">
					<span>
					  Share on <a href="#">Facebook</a>
					</span>
				  </p>
				</footer>
              </div>
                <?php break;}?>
		</section>
	</div>
    
</body>
</html>