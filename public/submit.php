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
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;border: 0;max-width: 600px !important;">
                            <tbody><tr>
                                <td valign="top" id="templatePreheader" style="background:#000000 none no-repeat top/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: none;background-repeat: no-repeat;background-position: top;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0px;padding-bottom: 0px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateHeader" style="background:#000000 none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0px;padding-bottom: 0px;"></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateBody" style="background:#000000 url(&quot;https://mcusercontent.com/0c4f620fb71b17602df4736a5/images/b995f59a-399f-449f-8b0a-86b0e89dcecb.jpg&quot;) no-repeat top/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: url(https://mcusercontent.com/0c4f620fb71b17602df4736a5/images/b995f59a-399f-449f-8b0a-86b0e89dcecb.jpg);background-repeat: no-repeat;background-position: top;background-size: cover;border-top: 1px none #ffffff;border-bottom: 2px none #EAEAEA;padding-top: 110px;padding-bottom: 50px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        
                            <table align="center" border="0" cellpadding="0" cellspacing="0" height="" width="450" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
	<tbody>
		<tr>
			<td height="" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
			<h1 style="text-align: left;display: block;margin: 0;padding: 0;color: #ffffff;font-family: Helvetica;font-size: 26px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;"><span style="color:#FFFFFF">Hoi ' . $friendsData[$id]['friendName'] . ',</span></h1>
			</td>
		</tr>
		<tr>
			<td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
			<p dir="ltr" style="text-align: left;margin: 10px 0;padding: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;"><span style="color:#FFFFFF">' . $fromName . ' fordert dich heraus! Mach mit beim interaktiven Game von RoadCross Schweiz und beweise, dass du die richtigen Entscheidungen triffst.</span></p>

			<p dir="ltr" style="text-align: left;margin: 10px 0;padding: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;"><br>
			<span style="color:#FFFFFF">Liebe Grüsse, Nina</span></p>
			</td>
		</tr>
	</tbody>
</table>

                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 50px 18px 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px none #EAEAEA;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody><tr>
                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top: 0;padding-right: 18px;padding-bottom: 18px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 5px;background-color: #DD2E44;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial;font-size: 16px;padding: 25px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                <a class="mcnButton " title="Jetzt Nina Daten" href="https://datenina.ch/" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;">Jetzt Nina Daten</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter" style="background:#000000 none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 9px;"></td>
                            </tr>
                        </tbody></table></body></html>';
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
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;border: 0;max-width: 600px !important;">
                            <tbody><tr>
                                <td valign="top" id="templatePreheader" style="background:#000000 none no-repeat top/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: none;background-repeat: no-repeat;background-position: top;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0px;padding-bottom: 0px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->

				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateHeader" style="background:#000000 none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0px;padding-bottom: 0px;"></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateBody" style="background:#000000 url(&quot;https://mcusercontent.com/0c4f620fb71b17602df4736a5/images/b995f59a-399f-449f-8b0a-86b0e89dcecb.jpg&quot;) no-repeat top/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: url(https://mcusercontent.com/0c4f620fb71b17602df4736a5/images/b995f59a-399f-449f-8b0a-86b0e89dcecb.jpg);background-repeat: no-repeat;background-position: top;background-size: cover;border-top: 1px none #ffffff;border-bottom: 2px none #EAEAEA;padding-top: 110px;padding-bottom: 50px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        
                            <table align="center" border="0" cellpadding="0" cellspacing="0" height="" width="450" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
	<tbody>
		<tr>
			<td height="" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
			<h1 style="text-align: left;display: block;margin: 0;padding: 0;color: #ffffff;font-family: Helvetica;font-size: 26px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;"><span style="color:#FFFFFF">Hi ' . $friendsData[$id]['friendName'] . ',</span></h1>
			</td>
		</tr>
		<tr>
			<td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
			<p dir="ltr" style="text-align: left;margin: 10px 0;padding: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;"><span style="color:#FFFFFF">' . $fromName . ' pense que tu ne vas pas réussir à passer les obstacles ! Viens faire un tour avec moi pour voir si tu prends les bonnes décisions.</span></p>

			<p dir="ltr" style="text-align: left;margin: 10px 0;padding: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;"><br>
			<span style="color:#FFFFFF">Cordialement, Nina</span></p>
			</td>
		</tr>
	</tbody>
</table>

                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 50px 18px 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px none #EAEAEA;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody><tr>
                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top: 0;padding-right: 18px;padding-bottom: 18px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 5px;background-color: #DD2E44;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial;font-size: 16px;padding: 25px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                <a class="mcnButton " title="Rancard avec Nina" href="https://datenina.ch/fr" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;">Rancard avec Nina</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter" style="background:#000000 none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 9px;"></td>
                            </tr>
                        </tbody></table></body></html>
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
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;border: 0;max-width: 600px !important;">
                            <tbody><tr>
                                <td valign="top" id="templatePreheader" style="background:#000000 none no-repeat top/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: none;background-repeat: no-repeat;background-position: top;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0px;padding-bottom: 0px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateHeader" style="background:#000000 none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0px;padding-bottom: 0px;"></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateBody" style="background:#000000 url(&quot;https://mcusercontent.com/0c4f620fb71b17602df4736a5/images/b995f59a-399f-449f-8b0a-86b0e89dcecb.jpg&quot;) no-repeat top/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: url(https://mcusercontent.com/0c4f620fb71b17602df4736a5/images/b995f59a-399f-449f-8b0a-86b0e89dcecb.jpg);background-repeat: no-repeat;background-position: top;background-size: cover;border-top: 1px none #ffffff;border-bottom: 2px none #EAEAEA;padding-top: 110px;padding-bottom: 50px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        
                            <table align="center" border="0" cellpadding="0" cellspacing="0" height="" width="450" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
	<tbody>
		<tr>
			<td height="" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
			<h1 style="text-align: left;display: block;margin: 0;padding: 0;color: #ffffff;font-family: Helvetica;font-size: 26px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;"><span style="color:#FFFFFF">Hi ' . $friendsData[$id]['friendName'] . ',</span></h1>
			</td>
		</tr>
		<tr>
			<td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
			<p dir="ltr" style="text-align: left;margin: 10px 0;padding: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;"><span style="color:#FFFFFF">' . $fromName . ' ti sfida! Partecipa al gioco interattivo di RoadCross Switzerland e dimostra che stai prendendo le decisioni giuste.</span></p>

			<p dir="ltr" style="text-align: left;margin: 10px 0;padding: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;"><br>
			<span style="color:#FFFFFF">Cordiali saluti, Nina</span></p>
			</td>
		</tr>
	</tbody>
</table>

                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 50px 18px 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px none #EAEAEA;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody><tr>
                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top: 0;padding-right: 18px;padding-bottom: 18px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 5px;background-color: #DD2E44;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial;font-size: 16px;padding: 25px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                <a class="mcnButton " title="Date Nina" href="https://datenina.ch/it" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;">Date Nina</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter" style="background:#000000 none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #000000;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 9px;"></td>
                            </tr>
                        </tbody></table></body></html>
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
