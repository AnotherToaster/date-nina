<?php

date_default_timezone_set('Europe/Zurich');
$date = date("Ydm");

$payload = file_get_contents('php://input');
$payload = str_replace(' null ', '""', $payload);
$params = json_decode($payload, true);

$adminMail = 'dr@rum.agency';
$adminName = 'Date-Nina';

$data = $params['data'];

$userData = $data['userData'];
$friendsData = $data['friendsData'];
$currentLanguage = $data['currentLanguage'];

$fromName = $userData['clientName'];
$fromEmail = $userData['clientEmail'];

$friendEmail = false;
$error = false;
$success = array('success' => false, 'friendsEmailSent' => array());

//Create Array for PHPMailer
$mailProp = array('fromName' => $fromName, 'fromEmail' => $fromEmail, 'friendsData' => $friendsData,
    'subject', 'emailMsg' => array());

if ($currentLanguage == 'de') {
    for ($id = 0; $id < count($friendsData); $id++) {
        $mailProp['subject'] = 'Jetzt Nina Daten';
        $mailProp['emailMsg'][$id] = '
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style>
        html, body {
            margin: 0;
            padding: 0;
            background: #000;
        }
    </style>
    <title>DATE NINA</title>
</head>
<body>
<style>
    html, body {
        margin: 0;
        padding: 0;
        background: #000;
    }

    table {
        background-repeat: no-repeat;
    }
</style>
<table border="0" width="100%" height="670" border="0" cellspacing="0" cellpadding="0" style="background-repeat: no-repeat;" background="https://date-nina.rum.dev/img/bg_email.jpg">
    <tr>
        <td>
            <table border="0" align="left" width="710" height="670" border="0" cellpadding="0" cellspacing="0" style="margin-left: 95px;">
                <tr>
                    <td height="" valign="top">
                        <div id="content" style="width:410px;">
                            <table border="0" align="left" width="410" height="" border="0" cellpadding="0" cellspacing="0">

                                <tr>
                                    <td height="150">
&nbsp;                                    </td>
                                </tr>
                                <tr>
                                    <td height="50">
                                        <h1 style="font-size: 20px; font-weight: bold; color: #FFF;">Hoi ' . $friendsData[$id]['friendName'] . ',</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="">
                                        <p style="font-size: 14px; font-weight: bold; color: #FFF; line-height:20px;">
                                            ' . $fromName . ' findet, du sollst mich daten!
                                            Mach mit beim interaktiven Game von RoadCross Schweiz.
                                            Wir werden sicher viel Spass miteinander haben,
                                            wenn du die richtigen Entscheidungen beim Date triffst ...</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="25">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td height="0">
                                        <table border="0" align="left" height="42" width="215" height="" border="0" cellpadding="0" cellspacing="0" background="https://date-nina.rum.dev/img/btn_inmail.png">
                                            <tr>
                                                <td>
                                                    <a style="font-size: 16px; font-weight: bold; color: #FFF; padding-left:40px; text-decoration: none;" href="https://date-nina.rum.dev/">JETZT NINA DATEN</a>
                                                </td>
                                            </tr>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
';
    }
} else if ($currentLanguage == 'fr') {
    for ($id = 0; $id < count($friendsData); $id++) {
        $mailProp['subject'] = 'Rancard avec Nina';
        $mailProp['emailMsg'][$id] = '
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style>
        html, body {
            margin: 0;
            padding: 0;
            background: #000;
        }
    </style>
    <title>DATE NINA</title>
</head>
<body>
<style>
    html, body {
        margin: 0;
        padding: 0;
        background: #000;
    }

    table {
        background-repeat: no-repeat;
    }
</style>
<table border="0" width="100%" height="670" border="0" cellspacing="0" cellpadding="0" style="background-repeat: no-repeat;" background="https://date-nina.rum.dev/img/bg_email.jpg">
    <tr>
        <td>
            <table border="0" align="left" width="710" height="670" border="0" cellpadding="0" cellspacing="0" style="margin-left: 95px;">
                <tr>
                    <td height="" valign="top">
                        <div id="content" style="width:410px;">
                            <table border="0" align="left" width="410" height="" border="0" cellpadding="0" cellspacing="0">

                                <tr>
                                    <td height="150">
&nbsp;                                    </td>
                                </tr>
                                <tr>
                                    <td height="50">
                                        <h1 style="font-size: 20px; font-weight: bold; color: #FFF;">Salut  ' . $friendsData[$id]['friendName'] . ',</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="">
                                        <p style="font-size: 14px; font-weight: bold; color: #FFF; line-height:20px;">
                                            ' . $fromName . ' pense que tu devrais me proposer un rancart !
                                             Joue le jeu avec la vidéo interactive de Roadcross Schweiz. 
                                             Nous allons certainement passer de bons moments si tu fais les bons choix au cours de la soirée.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="25">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td height="0">
                                        <table border="0" align="left" height="42" width="215" height="" border="0" cellpadding="0" cellspacing="0" background="https://date-nina.rum.dev/img/btn_inmail.png">
                                            <tr>
                                                <td>
                                                    <a style="font-size: 16px; font-weight: bold; color: #FFF; padding-left:40px; text-decoration: none;" href="https://date-nina.rum.dev/">Rancard avec Nina</a>
                                                </td>
                                            </tr>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
';
    }
} else if ($currentLanguage == 'it') {
    for ($id = 0; $id < count($friendsData); $id++) {
        $mailProp['subject'] = 'Date Nina';
        $mailProp['emailMsg'][$id] = '
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style>
        html, body {
            margin: 0;
            padding: 0;
            background: #000;
        }
    </style>
    <title>DATE NINA</title>
</head>
<body>
<style>
    html, body {
        margin: 0;
        padding: 0;
        background: #000;
    }

    table {
        background-repeat: no-repeat;
    }
</style>
<table border="0" width="100%" height="670" border="0" cellspacing="0" cellpadding="0" style="background-repeat: no-repeat;" background="https://date-nina.rum.dev/img/bg_email.jpg">
    <tr>
        <td>
            <table border="0" align="left" width="710" height="670" border="0" cellpadding="0" cellspacing="0" style="margin-left: 95px;">
                <tr>
                    <td height="" valign="top">
                        <div id="content" style="width:410px;">
                            <table border="0" align="left" width="410" height="" border="0" cellpadding="0" cellspacing="0">

                                <tr>
                                    <td height="150">
&nbsp;                                    </td>
                                </tr>
                                <tr>
                                    <td height="50">
                                        <h1 style="font-size: 20px; font-weight: bold; color: #FFF;">Ciao  ' . $friendsData[$id]['friendName'] . ',</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="">
                                        <p style="font-size: 14px; font-weight: bold; color: #FFF; line-height:20px;">
                                            ' . $fromName . ' pensa che mi dovresti dare un appuntamento! 
                                            Partecipa al gioco interattivo di RoadCross Svizzera. 
                                            Ci divertiremo di sicuro se al momento dell\' appuntamento prendo la decisione giusta.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="25">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td height="0">
                                        <table border="0" align="left" height="42" width="215" height="" border="0" cellpadding="0" cellspacing="0" background="https://date-nina.rum.dev/img/btn_inmail.png">
                                            <tr>
                                                <td>
                                                    <a style="font-size: 16px; font-weight: bold; color: #FFF; padding-left:40px; text-decoration: none;" href="https://date-nina.rum.dev/">JETZT NINA DATEN</a>
                                                </td>
                                            </tr>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
';
    }
}


require_once('./phpMailer/src/PHPMailer.php');
require_once('./phpMailer/src/Exception.php');

if (count($mailProp['friendsData']) >= 1 && count($mailProp['friendsData']) <= 5) {

    if (array_key_exists('subject', $mailProp)) {
        $subject = substr(strip_tags($mailProp['subject']), 0, 50);
    } else {
        $mailProp['subject'] = 'No subject given';
        $error = true;
    }/*
    if (array_key_exists('emailMsg', $mailProp)) {
        $emailMsg = substr(strip_tags($mailProp['emailMsg']), 0, 250);
    } else {
        $mailProp['emailMsg'] = 'No Message provided!';
        $error = true;
    }*/
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
