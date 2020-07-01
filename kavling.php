<?php

echo "L.marker([-7.900509, 112.6069513]).bindPopup(part, customOptions).addTo(kavling),
L.marker([-7.905609, 112.6122395]).bindPopup(part, customOptions).addTo(kavling),
L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(kavling),
L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(kavling);";
require('conn/koneksi.php');

$jenis = "P002";
$db = $mysqli->prepare("SELECT * FROM properti a join jenisProperti b on a.JenisID=b.JenisID where a.JenisID = ?");
$db->bind_param("s",$jenis);
$db->execute();

$cos = $db->get_result();
$res = $cos->fetch_all(MYSQLI_ASSOC);
var_dump($res);

sizeof($res);
foreach ($res as $key => $sult) {
    echo "L.marker([-7.900509, 112.6069513]).bindPopup(part, customOptions).addTo(kavling)".";";
}
?>