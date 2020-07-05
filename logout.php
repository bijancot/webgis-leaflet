<?php
session_destroy();

echo ("<script LANGUAGE='JavaScript'>
window.alert('Terimakasih! :)');
window.location.href='".$base_url."';
</script>");
?>