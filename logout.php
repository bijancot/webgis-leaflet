<?php
session_destroy();

$base_url = "https://kristomoyo.com/leaflet";
echo ("<script LANGUAGE='JavaScript'>
window.alert('Terimakasih! :)');
window.location.href='".$base_url."';
</script>");
?>