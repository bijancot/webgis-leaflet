<?php

require 'conn/koneksi.php';
$jenisProperti = $_GET['jenis'];
$idProperti = $_GET['properti'];



$jenis = "P006";
$db = $mysqli->prepare("SELECT * FROM properti a join foto_tabel b on a.PropertiID=b.PropertiID where a.PropertiID= ?");
$db->bind_param("s",$idProperti);
$db->execute();

$cos = $db->get_result();
$res = $cos->fetch_all(MYSQLI_ASSOC);

foreach ($res as $key => $value) {
    echo $value['Foto'];
}
?>