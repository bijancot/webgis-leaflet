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
<body>
    <form action="filter.php" method="get">
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
        echo "<b>Hasil Pencarian : ".$cari."</b>";
    }
    ?>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Jenis Properti</th>
            <th>Nama Properti</th>
            <th>Alamat Properti</th>
            <th>Harga Properti</th>
            <th>Luas Properti</th>
            <th>Jarak Properti dari Pusat Kota</th>
            <th>Jumlah Cicilan Properti</th>
            <th>Tahun Bangun Properti</th>
        </tr>
        <?php
        if(isset($_GET['cari'])){
            $alamat = $_GET['Alamat_properti'];
            $harga = $_GET['Harga'];
            $luas = $_GET['Luas'];
            $jarak = $_GET['Jarak'];
            $jumlahCicil = $_GET['Jumlah_cicil'];
            $tahunBangun = $_GET['Tahun_bangun'];
            // $data = mysql_query("SELECT PropertiName, NamaProperti, Alamat_properti ,Harga, Luas, Jarak, Jumlah_cicil, Tahun_bangun FROM jenis_properti a JOIN properti b on a.PropertiID=b.PropertiID WHERE Harga like '%".$cari."%' OR Luas like '%".$cari."%' OR Jarak like '%".$cari."%' OR Jumlah_cicil like '%".$cari."%' OR Tahun_bangun like '%".$cari."%'");
            $db = $mysqli->prepare("SELECT * FROM jenisProperti a JOIN properti b on a.JenisID=b.JenisID WHERE Alamat_properti LIKE '%?%' AND Harga like '%?%' AND Luas like '%?%' AND Jarak like '%?%' AND Jumlah_cicil like '%?%' AND Tahun_bangun like '%?%'");
            $db->bind_param("ssssss",$alamat,$harga,$luas,$jarak,$jumlahCicil,$tahunBangun);

            $alamat = $_GET['Alamat_properti'];
            $harga = $_GET['Harga'];
            $jarak = $_GET['Jarak'];
            $jumlahCicil = $_GET['Jumlah_cicil'];
            $tahunBangun = $_GET['Tahun_bangun'];
            $db->execute();

            $cos = $db->get_result();
            $res = $cos->fetch_all(MYSQLI_ASSOC);
        } else{
            // $data = mysql_query("SELECT * FROM properti a join jenisProperti b on a.JenisID=b.JenisID");
        }
        $jenis = "asdasd";
        $db = $mysqli->prepare("SELECT * FROM properti a join jenisProperti b on a.JenisID=b.JenisID where a.PropertiID!=?");
        $db->bind_param("s",$jenis);
        $db->execute();
        
        $cos = $db->get_result();
        $res = $cos->fetch_all(MYSQLI_ASSOC);

        echo $no = 1;
        foreach ($res as $key => $d) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['NamaJenis']; ?></td>
                <td><?php echo $d['NamaProperti']; ?></td>
                <td><?php echo $d['Alamat_properti']; ?></td>
                <td><?php echo $d['Harga']; ?></td>
                <td><?php echo $d['Luas']; ?></td>
                <td><?php echo $d['Jarak']; ?></td>
                <td><?php echo $d['Jumlah_cicil']; ?></td>
                <td><?php echo $d['Tahun_bangun']; ?></td>
            </tr>

            
            <?php } ?>

    </table>

</body>
</html>