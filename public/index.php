<?php

/*$cookiefirstInit = 'firstInit';
$cookieLang = 'lang';

$userLanguage = $_GET['lang'] ? $_GET['lang'] : 'de';
$prefLang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

if (strpos($prefLang, 'de') !== false || strpos($prefLang, 'fr') !== false || strpos($prefLang, 'it') !== false) {

    var_dump($prefLang);

    $prioDe = array('de' => strpos($prefLang, 'de'));
    $prioFr = array('fr' => strpos($prefLang, 'fr'));
    $prioIt = array('it' => strpos($prefLang, 'it'));

    echo json_encode($prefLang = min($prioIt, $prioFr, $prioDe));
    echo json_encode($prefLang = min($prioDe['de'], $prioIt['it'], $prioFr['fr']));
    echo json_encode($prefLang = min($prioFr['fr'], $prioDe['de'], $prioIt['it']));

   echo json_encode($prefLang);

} else {
    $prefLang = 'de';
}*/


if (isset($_GET['lang'])) {
    $userLanguage = $_GET['lang'];
} else {
    $userLanguage = 'de';
}

/*if (!isset($_COOKIE[$cookiefirstInit])) {
    setcookie($cookiefirstInit, true, time() + (86400 * 365)); // 86400 = 1 day
    setcookie($cookieLang, $userLanguage, time() + (86400 * 365)); // 86400 = 1 day
}*/
$html = file_get_contents('index.html');

$html = str_replace('<html lang="en">', '<html lang="' . $userLanguage . '">', $html);

echo $html;
