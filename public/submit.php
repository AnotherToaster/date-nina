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

$toName = $friendsData['friendName'];
$toEmail = $friendsData['friendEmail'];

/*
//***** Development Purpose ******
$fromName = 'john';
$fromEmail = $adminMail;
$toName = 'foo';
$toEmail = $adminMail;
//*****                     ******
*/

$success = false;

$emailMsg= '
<html>
<head>
<title>JETZT NINA DATEN</title>
</head>
<body>
<p>Hoi ' . $toName . ',</p>
<p>' . $fromEmail . ' findet, du sollst mich daten!</p>
<p>Mach mit beim interaktiven Game von RoadCross Schweiz. Wir werden sicher viel 
Spass miteinander haben, wenn du die richtigen Entscheidungen beim Date triffst ...</p>
</body>
</html>
';

//Create Array for PHPMailer
$mailProp = array('fromName' => $fromName, 'fromEmail' => $fromEmail, 'toName' => $toName, 'toEmail' => $toEmail,
    'subject' => $subject, 'emailMsg' => $emailMsg);

$error = false;

require_once('./phpMailer/src/PHPMailer.php');
require_once('./phpMailer/src/Exception.php');


if (array_key_exists('toEmail', $mailProp)) {

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
    if (array_key_exists('toName', $mailProp) && strlen($mailProp['toName']) >= 3) {
        $toName = substr(strip_tags($mailProp['toName']), 0, 26);
    } else {
        $mailProp['toName'] = 'Invalid Name';
        $error = true;
    }
    if (array_key_exists('fromEmail', $mailProp) && filter_var($mailProp['fromEmail'], FILTER_VALIDATE_EMAIL)) {
        $fromEmail = $mailProp['fromEmail'];
    } else {
        $mailProp['fromEmail'] = 'Invalid client email provided';
        $error = true;
    }
    if (array_key_exists('toEmail', $mailProp) && filter_var($mailProp['toEmail'], FILTER_VALIDATE_EMAIL)) {
        $toEmail = $mailProp['toEmail'];
    } else {
        $mailProp['toEmail'] = 'Invalid friend email address provided';
        $error = true;
    }

    if (!$error) {
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->CharSet = 'utf-8';

        //Recipients
        $mail->From = $fromEmail;
        $mail->FromName = $fromName;
        $mail->AddAddress($toEmail);
        $mail->AddReplyTo($fromEmail, $fromName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $emailMsg;

        if ($mail->Send()) {
            $success = array('success' => true);
            echo json_encode($success);
            exit();
        }
    }
}
echo json_encode($success = array('success' => false, 'Userdata' => $userData,
    'FriendsData' => $friendsData, 'mailProp' => $mailProp, 'Error' => $error));
http_response_code(400);
exit();
