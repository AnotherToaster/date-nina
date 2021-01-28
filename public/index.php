<?php

if (isset($_GET['lang'])) {
    $userLanguage = $_GET['lang'];
} else {
    $userLanguage = 'de';
}

$html = file_get_contents('index.html');
$configs = file_get_contents('appConfigs.json');
$configsJson = json_encode(json_decode($configs));

$html = str_replace('<html lang="en">', '<html lang="' . $userLanguage . '">', $html);
$html = str_replace('%%-var-%%',$configsJson ,  $html);

echo $html;
