<?php
/**
 * * @file
 * php version 8.2
 * Send User Email For Model Release Form
 * 
 * @category Send_User_Email
 * @package  Send_User_Email_Configuration_Page
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/send_user_email.php
 */
//================================================================================//
date_default_timezone_set('America/New_York');
//================================================================================//
/**
 * The SendUseremail funtion sends the email to the user to reset their password
 * 
 * @param string $email              This param has the email address
 * @param string $reset_hashed_token This param has the hashed token stored in the database
 * 
 * @access public
 * 
 * @return mixed
 */
function SendUseremail(string $email, string $reset_hashed_token)
{
  $mail = include "mailer.php";
  $mail->setFrom("hoyrod1@gmail.com");
  $mail->FromName = "STC media inc";
  $mail->addReplyTo('hoyrod1@gmail.com');
  $mail->addAddress($email);
  $mail->Subject  = "Reset Password";
  $mail->Body     = <<<END
  Please click on this link: <a href="http://localhost:8888/model-release-form/pages/reset-password/code.php?Email=$email&Code=$reset_hashed_token">Click here</a> and re-enter your email to reset your password.
  END;
  
  try {
      $mail->send();
      $_SESSION['reset_password_success'] = "Check you email to reset password";
      header("Location: reset-password.php");
  } catch (Exception $e) {
      $_SESSION['reset_password_error'] = "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
      header("Location: reset-password.php");
  }
}
//=================================================================================//