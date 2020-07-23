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
    <title>Data</title>
    <title>Propertikuuu - webgis</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <?php
        if($id_ === ""){ ?>
            <script type="text/javascript">
                $(document).ready(function () {            
                    $('#toggle_div').hide()
                });
            </script>
            <?php
        }else{ ?>
            <script type="text/javascript">
                $(document).ready(function () {            
                    $('#toggle_div').show()
                });
            </script>
            <?php
        }
    ?>
	
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
        table{
            padding: 100;
        }
	</style>

</head>

<body>
    <?php require 'header.php'?>
    <br/>
    <!-- <h1 style="color:black;font-size:40px;" align="center">Data Proerti Malang Raya</h1> -->
    <br/>
        <table border="0" align="center" class="table">
            <tr>
                <th align="center">Icon</th>
                <th align="center">Keterangan</th>
                <th align="center">Aksi</th>
            </tr>
            <tr>
                <td><img src="icon/ellite.png" height="50px" width="50px;"></td>
                <td style="vertical-align: middle;">Perumahan cluster Menengah keatas(Ellite)</td>
                <td style="vertical-align: middle;"> <a id="toogle" href="dataprop.php?id_=P001">Lihat</a> </td>
            </tr>
            <tr>
                <td><img src="icon/home.png" height="50px" width="50px;"></td>
                <td style="vertical-align: middle;">Perumahan Bersubsidi</td>
                <td style="vertical-align: middle;"> <a id="toogle" href="dataprop.php?id_=P002">Lihat</a> </td>
            </tr>
            <tr>
                <td><img src="icon/kavling.png" height="50px" width="50px;"></td>
                <td style="vertical-align: middle;">Tanah Kavling</td>
                <td style="vertical-align: middle;"> <a id="toogle" href="dataprop.php?id_=P003">Lihat</a> </td>
            </tr>
            <tr>
                <td><img src="icon/rusun.png" height="50px" width="50px;"></td>
                <td style="vertical-align: middle;">Rumah Susun</td>
                <td style="vertical-align: middle;"> <a id="toogle" href="dataprop.php?id_=P004">Lihat</a> </td>
            </tr>
            <tr>
                <td><img src="icon/villa.png" height="50px" width="50px;"></td>
                <td style="vertical-align: middle;">Villa / Condominium</td>
                <td style="vertical-align: middle;"> <a id="toogle" href="dataprop.php?id_=P005">Lihat</a> </td>
            </tr>
            <tr>
                <td><img src="icon/apartment.png" height="50px" width="50px;"></td>
                <td style="vertical-align: middle;">Apartement</td>
                <td style="vertical-align: middle;"> <a id="toogle" href="dataprop.php?id_=P006" >Lihat</a> </td>
            </tr>
        </table>
        
        <script>
            function searchSN(elem) {        
                <?php $where_value='P001'?>
            }
        </script>

        <table id="toggle_div" border="0" align="center" class="table" width="80%">
            <tr>
                <th style="vertical-align: middle; text-align: center">No</th>
                <th style="vertical-align: middle;">Nama Properti</th>
                <th style="vertical-align: middle; text-align: center">Alamat Properti</th>
                <?php
                    if($id_ != "P005"){
                        echo "<th style='vertical-align: middle; text-align: center'>Luas Properti</th>";
                    }
                ?>
                <th align="center" style="vertical-align: middle; text-align: center">
                    <?php 
                        if($id_ == "P001" || $id_ == "P002" || $id_ == "P003"){
                            echo "Cicilan";
                        }else{
                            echo "Jarak Pusat Kota";
                        }
                    ?>
                </th>
            </tr>
            <?php
                $query = mysqli_query($mysqli,"SELECT * FROM properti where JenisID='$id_'");
            ?>
            <?php if(mysqli_num_rows($query)>0){ ?>
            <?php
                $no = 1;
                while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><a href="detail.php?jenis=<?php echo $id_ ?>&properti=<?php echo $data["PropertiID"];?>"> <?php echo $data["NamaProperti"];?></a></td>
                <td><?php echo $data["Alamat_properti"];?></td>
                <?php
                    if($id_ != "P005"){
                        echo "<td align='center'>".$data['Luas']. "m2</td>";
                    }
                ?>
                <td align="center">
                    <?php 
                        if($id_ == "P001" || $id_ == "P002" || $id_ == "P003"){
                            echo $data["Jumlah_cicil"];
                        }else{
                            echo $data["Jarak"] ." KM";
                        }
                    ?>
                </td>
            </tr>
            <?php $no++; } ?>
            <?php } ?>
        </table>

        <br/>

        <center>
            <button class="button is-outlined is-black" onclick="location.href='layer-contoh.php'">Buka MAPS</button>
        </center>

        <br/><br/>
<!-- 
        <script>
		$(document).on('click','#toogle',function(){
			$('#toggle_div').toggle();
		});
		</script> -->
    
</body>

</html>