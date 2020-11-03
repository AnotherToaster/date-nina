<?php

date_default_timezone_set('Europe/Zurich');
$date = date("Ydm");

$payload = file_get_contents('php://input');
$payload = str_replace(' null ', '""', $payload);
$params = json_decode($payload, true);

$adminMail = 'dr@rum.agency';
$adminName = 'Date-Nina';
$subject = 'JETZT NINA DATEN';

$data = $params['data'];

$userData = $data['userData'];
$friendsData = $data['friendsData'];

$fromName = $userData['clientName'];
$fromEmail = $userData['clientEmail'];

$friendEmail = false;
$error = false;
$emailMsg = '';
$success = array('success' => false, 'friendsEmailSent' => array());

//Create Array for PHPMailer
$mailProp = array('fromName' => $fromName, 'fromEmail' => $fromEmail, 'friendsData' => $friendsData,
    'subject' => $subject, 'emailMsg' => array());


for ($id = 0; $id < count($friendsData); $id++) {
    $mailProp['emailMsg'][$id] = '
<html>
<head>
</head>
<body>
<p>Hoi ' . $friendsData[$id]['friendName'] . ',</p>
<p>' . $fromEmail . ' findet, du sollst mich daten!</p>
<p>Mach mit beim interaktiven Game von RoadCross Schweiz. Wir werden sicher viel 
Spass miteinander haben, wenn du die richtigen Entscheidungen beim Date triffst ...</p>
</body>
</html>
';
}

require_once('./phpMailer/src/PHPMailer.php');
require_once('./phpMailer/src/Exception.php');

if (count($mailProp['friendsData']) >= 1 && count($mailProp['friendsData']) <= 5) {

    if (array_key_exists('subject', $mailProp)) {
        $subject = substr(strip_tags($mailProp['subject']), 0, 50);
    } else {
        $mailProp['subject'] = 'No subject given';
        $error = true;
    }
    if (array_key_exists('emailMsg', $mailProp)) {
        $emailMsg = substr(strip_tags($mailProp['emailMsg']), 0, 250);
    } else {
        $mailProp['emailMsg'] = 'No Message provided!';
        $error = true;
    }
    if (array_key_exists('fromName', $mailProp) && strlen($mailProp['fromName']) >= 3) {
        $fromName = substr(strip_tags($mailProp['fromName']), 0, 26);
    } else {
        $mailProp['fromName'] = 'Invalid Name';
        $error = true;
    }
    if (array_key_exists('fromEmail', $mailProp) && filter_var($mailProp['fromEmail'], FILTER_VALIDATE_EMAIL)) {
        $fromEmail = $mailProp['fromEmail'];
    } else {
        $mailProp['fromEmail'] = 'Invalid client email provided';
        $error = true;
    }

    for ($id = 0; $id < count($friendsData); $id++) {
        if (array_key_exists('friendName', $mailProp['friendsData'][$id]) && strlen($mailProp['friendsData'][$id]['friendName']) >= 3) {
            $toName[$id] = substr($mailProp['friendsData'][$id]['friendName'], 0, 26);
        } else {
            $mailProp['friendsData'][$id]['friendName'] = 'Invalid Name';
            $error = true;
        }
        if (array_key_exists('friendEmail', $mailProp['friendsData'][$id]) && filter_var($mailProp['friendsData'][$id]['friendEmail'], FILTER_VALIDATE_EMAIL)) {
            $toEmail[$id] = $mailProp['friendsData'][$id]['friendEmail'];
        } else {
            $mailProp['friendsData'][$id]['friendEmail'] = 'Invalid friend email address provided';
            $error = true;
        }
    }
    if (!$error) {
        for ($id = 0; $id < count($friendsData); $id++) {

            //***** Development/Testing ******
            /*
            $fromName = 'John';
            $fromEmail = $adminMail;
            $toName[$id] = 'Foo';
            $toEmail[$id] = $adminMail;
            */
            //***** For Production, put block in Comment ******

            $mail[$id] = new \PHPMailer\PHPMailer\PHPMailer();
            $mail[$id]->CharSet = 'utf-8';

            //Recipients
            $mail[$id]->From = $fromEmail;
            $mail[$id]->FromName = $fromName;
            $mail[$id]->AddAddress($toEmail[$id]);
            $mail[$id]->AddReplyTo($fromEmail, $fromName);

            // Content
            $mail[$id]->isHTML(true);
            $mail[$id]->Subject = $subject;
            $mail[$id]->Body = $mailProp['emailMsg'][$id];

            if ($mail[$id]->Send()) {
                $success['friendsEmailSent'][$id] = true;
                $success['success'] = true;
            } else {
                $success['friendsEmailSent'][$id] = false;
                $success['success'] = false;
                $error = true;
            }
        }
    }
    array_push($success, $mailProp);
    echo json_encode($success);
    exit();
}

$error = true;
echo json_encode($success = array('success' => false, 'Userdata' => $userData,
    'FriendsData' => $friendsData, 'mailProp' => $mailProp, 'Error' => $error));
http_response_code(400);
exit();
