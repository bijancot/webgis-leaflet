<?php
session_destroy();

$base_url = "http://kristomoyo.com/leaflet";
echo ("<script LANGUAGE='JavaScript'>
window.alert('Terimakasih! :)');
window.location.href='".$base_url."';
</script>");
?>