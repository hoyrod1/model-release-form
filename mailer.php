<?php
/**
 * * @file
 * php version 8.2
 * Mailer Page for CMS
 * 
 * @category Model_Release_Form_Mailer
 * @package  Model_Release_Form_Mailer_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form//mailer.php
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
// $mail->SMTPDebug  = 0;
// $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
$mail->SMTPDebug  = SMTP::DEBUG_OFF;
$mail->Host       = "xxx";
$mail->SMTPSecure = "ssl";
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = "xxx";
$mail->Username   = "xxx";
$mail->Password   = "xxx";

$mail->isHTML(true);

return $mail;
