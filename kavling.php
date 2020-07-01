<?php
require('conn/koneksi.php');

$jenis = "P002";
$db = $mysqli->prepare("SELECT * FROM properti a join jenisProperti b on a.JenisID=b.JenisID where a.JenisID = ?");
$db->bind_param("s",$jenis);
$db->execute();

$cos = $db->get_result();
$res = $cos->fetch_all(MYSQLI_ASSOC);

sizeof($res);
foreach ($res as $key => $sult) {
    echo "L.marker([".$sult['Latitude'].",".$sult['Longitude']."]).bindPopup(part, customOptions).addTo(kavling);";
}

require 'layer/kavling.php';
?>