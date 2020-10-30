<?php

date_default_timezone_set('Europe/Zurich');
$date = date("Ydm");

$payload = file_get_contents('php://input');
$payload = str_replace(' null ', '""', $payload);
$params = json_decode($payload, true);

//Values for Mail
$adminMail = 'dr@rum.agency';
$adminName = 'Date-Nina';
$subject = 'Date-Nina';


$data = $params['data'];
$userData = $data['userData'];
$clientName = $userData['clientName'];
$clientEmail = $userData['clientEmail'];


if (strlen($clientName) >= 3) {
    $success = array('success' => true, 'clientName' => $clientName);
} else {
    $error = 'invalid Name';
    $success = array('success' => false, 'Error' => $error);
}

echo (json_encode($success));
if ($success['success'] == false) {
    http_response_code(400);
}
exit();