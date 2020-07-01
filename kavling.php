<?php

include_once('conn/koneksi.php');


$db = $mysqli->prepare("SELECT * FROM properti a join jenisProperti b on a.JenisID=b.JenisID where a.JenisID = '?'");
$db->bind_param("s",$jenis);

$jenis = "P002";
$db->execute();
$db->fetchAll();

var_dump($db);

echo "L.marker([-7.900509, 112.6069513]).bindPopup(part, customOptions).addTo(kavling),
L.marker([-7.905609, 112.6122395]).bindPopup(part, customOptions).addTo(kavling),
L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(kavling),
L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(kavling);";
?>