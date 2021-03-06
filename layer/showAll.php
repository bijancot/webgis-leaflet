<?php

echo "var greenIcon = new L.Icon({
	iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
	shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
	iconSize: [25, 41],
	iconAnchor: [12, 41],
	popupAnchor: [1, -34],
	shadowSize: [41, 41]
    });\n";

echo "var showAll = L.layerGroup();\n";

$jenis = "P";
$db = $mysqli->prepare("SELECT * FROM properti a join jenisProperti b on a.JenisID=b.JenisID where a.JenisID != ?");
$db->bind_param("s",$jenis);
$db->execute();

$cos = $db->get_result();
$res = $cos->fetch_all(MYSQLI_ASSOC);

$count = 0;
foreach ($res as $key => $sult) {
    echo "var part_all_".$count." = '<h2>".$sult['NamaJenis']."".$sult['NamaProperti']."</h2><div class=\"columns\">'+
		'<div class=\"column\">' +
		'<img src = \"https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/91400513_1553639021452975_5524976870795247616_n.png?_nc_cat=110&_nc_sid=730e14&_nc_eui2=AeF3Z5XcreiARhaAIR3lFBk8i4S9cKEyQ4KLhL1woTJDgjW1y9_p-osrlqnLwrxBLxlX95MDOg9MvMSQ2wqcufoN&_nc_ohc=w6KoWgus7VAAX-dK1mL&_nc_ht=scontent-sin6-2.xx&oh=1b5cea5b065fe627c23d040f57ab790a&oe=5F166FF5\"/>' +
		'</div>'+
		'<div class=\"column\">".$sult['NamaProperti']."</div>'+
	'</div>';\n";

	
	echo "var customOptions_all_".$count." =
        {
        'maxWidth': '800',
        'maxheight': '800',
        'className' : 'custom_all_".$count,"'
        }\n";
    echo "L.marker([".$sult['Latitude'].",".$sult['Longitude']."], {icon: greenIcon}).bindPopup(part_all_".$count,", customOptions_all_".$count.").addTo(showAll);";

    $count++;
}
?>