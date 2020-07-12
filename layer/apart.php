<?php

echo "var blackIcon = new L.Icon({
	iconUrl: 'icon/apartment.png',
	shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
	iconSize: [25, 41],
	iconAnchor: [12, 41],
	popupAnchor: [1, -34],
	shadowSize: [41, 41]
    });\n";

echo "var apart = L.layerGroup();\n";

$jenis = "P006";
$db = $mysqli->prepare("SELECT * FROM properti a join jenisProperti b on a.JenisID=b.JenisID where a.JenisID = ?");
$db->bind_param("s",$jenis);
$db->execute();

$cos = $db->get_result();
$res = $cos->fetch_all(MYSQLI_ASSOC);

$count = 0;
foreach ($res as $key => $sult) {
    echo "var part_kav_".$count." = '<h6 class=\"".$sult['NamaJenis']."\">Jenis Properti :</h6>".$sult['NamaJenis']."'+
    '<h3 class=\"title\">".$sult['NamaProperti']."</h3>'+
    '<br/>' +
    '<p>alamat Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis similique explicabo vero, commodi, sapiente quas praesentium quia eligendi sint aperiam maiores quisquam modi quo itaque ab amet aspernatur saepe! A.</p>' +
    '<p>tahun bangun</p>' +
    '<p>Jarak ke pusat kota</p>' +
    '<br/><br/>'+
    'Info Lebih lanjut :'+
    '<a href=\"detail.php?jenis=".$sult['JenisID']."&properti=".$sult['PropertiID']."\">Detail properti</a>'\n";

	
	echo "var customOptions_kav_".$count." =
        {
        'maxWidth': '400',
        'maxheight': '400',
        'className' : 'custom_kav_".$count,"'
        }\n";
    echo "L.marker([".$sult['Latitude'].",".$sult['Longitude']."], {icon: blackIcon}).bindPopup(part_kav_".$count,", customOptions_kav_".$count.").addTo(apart);";

    $count++;
}
?>