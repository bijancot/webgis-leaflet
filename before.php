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
    $id_ = isset($_GET['id_']) ? $_GET['id_'] : '';;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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

        fieldset{
			width: 75%; /* lebar */
			border-color: black; /* warna garis tepi */
			box-shadow: 2px 2px 4px #333; /* bayangan */
            padding: 10px;
		}
        table{
            padding: 100;
        }
	</style>

</head>

<body>
    <?php require 'header.php'?>
    <br/>
    <h2 style="color:black;font-size:30px;" align="center"><b>Selamat Datang Di Webgis Properti Malang Raya</b></h2>
    <!-- <h2 style="color:black;font-size:30px;" align="center">Terlengkap Se-Malang Raya</h2> -->
    <br/>
    <center>
        <fieldset>
            <legend></legend>
            <p>
            Web Sistem Informasi Geografis Properti Malang Raya adalah suatu sistem informasi yang menyajikan peta digital berbasis WebGIS untuk memudahkan pencarian data dan informasi tentang pemetaan properti yang ada di wilayah Malang Raya. 
            </p>    
        </fieldset>
        <br/><br/>
        <button class="button is-outlined is-black" onclick="location.href='layer-contoh.php'">MAPS</button>
        <br/><br/>
        <table border="1" align="center" width="50%" class="table">
            <tr>
                <th colspan="3" align="center"><p style="font-size:20px;">Beberapa fitur unggulan dalam webgis kami, yaitu :</p></th>
            </tr>
            <tr>
                <td><b>1. </b></td>
                <td><b>Filter</b><br/>Melakukan pencarian properti berdasarkan kategori tertentu </td>
                <td>
                    <br/>
                        Alamat.<br/>
                        Harga.<br/>
                        Jarak Pusat Kota.<br/>
                        Tahun Bangun Gedung.<br/>
                        Luas Gedung.<br/>
                        Jumlah Cicilan.
                </td>
            </tr>
            <tr>
                <td><b>2. </b></td>
                <td><b>Data Properti Yang Lengkap</b><br/>Terdapat beragam informasi properti se malang raya</td>
                <td><br/><a href="dataprop.php">Lihat Data</a></td>
            </tr>
            <tr>
                <td><b>3. </b></td>
                <td><b>Detail Properti</b><br/>Detail Properti yang menarik, singkat dan juga jelas.</td>
                <td> </td>
            </tr>
            <tr>
                <td><b>4. </b></td>
                <td><b>Website Ringan</b><br/>Website yang sangat ringan ketika di akses.</td>
                <td> </td>
            </tr>
        </table>
   </center>
   <br/><br/>
</body>

</html>