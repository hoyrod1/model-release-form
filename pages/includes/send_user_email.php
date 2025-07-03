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
 * @link     https://model-release-form/pages/incudes/send_user_email.php
 */
//================================================================================//

//================================================================================//
/**
 * The SendUseremail funtion sends the email to the user to reset their password
 * 
 * @param string $email    This param has the email address
 * @param string $val_code This param has the verification code stored in the database
 * 
 * @access public
 * 
 * @return mixed
 */
function SendUseremail(string $email, string $val_code)
{
  $mail = include "../../mailer.php";
  $mail->setFrom("hoyrod1@gmail.com");
  $mail->FromName = "Rodney St. Cloud";
  $mail->addReplyTo('hoyrod1@gmail.com');
  $mail->addAddress($email);
  // $mail->Subjuct  = "Password reset";
  
  $mail->Body     = <<<END
  Copy & paste {$val_code} in the text field Click on link: http://www.kadenstcloud.com/code.php?Email=$email&Code=$val_code
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