<?php
include 'rupiah.php';

echo "var orangeIcon = new L.Icon({
	iconUrl: 'icon/rusun.png',
	shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
	iconSize: [25, 41],
	iconAnchor: [12, 41],
	popupAnchor: [1, -34],
	shadowSize: [41, 41]
    });\n";

echo "var rusun = L.layerGroup();\n";

$jenis = "P004";
$db = $mysqli->prepare("SELECT * FROM properti a join jenisProperti b on a.JenisID=b.JenisID where a.JenisID = ?");
$db->bind_param("s",$jenis);
$db->execute();

$cos = $db->get_result();
$res = $cos->fetch_all(MYSQLI_ASSOC);

$count = 0;
foreach ($res as $key => $sult) {
	echo "var part_kav_".$count." = '<h6 class=\"".$sult['NamaJenis']."\">Jenis Properti : ".$sult['NamaJenis']."</h6>'+
    '<h3 class=\"title\">".$sult['NamaProperti']."</h3>'+
    '<p>Alamat Properti : ".$sult['Alamat_properti']."</p>' +
    '<p>Harga : ".rupiah($sult['Harga'])."</p>' +
    'Info Lebih lanjut :'+
    '<a href=\"detail.php?jenis=".$sult['JenisID']."&properti=".$sult['PropertiID']."\">Detail properti</a>'\n";

	
	echo "var customOptions_kav_".$count." =
        {
        'maxWidth': '300',
        'maxheight': '300',
        'className' : 'custom_kav_".$count,"'
        }\n";
    echo "L.marker([".$sult['Latitude'].",".$sult['Longitude']."], {icon: orangeIcon}).bindPopup(part_kav_".$count,", customOptions_kav_".$count.").addTo(rusun);";

    $count++;
}
?>