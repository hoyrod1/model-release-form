<?php
/**
 * * @file
 * php version 8.2
 * Send User _PDFEmail For Model Release Form
 * 
 * @category Send_User_PDF_Email
 * @package  Send_User_PDF_Email_Configuration_Page
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/send_user_updated_pdf_email.php
 */
//=================================================================================//
date_default_timezone_set('America/New_York');
//=================================================================================//
/**
 * The SendUserUpdatedPdfemail funtion sends the initial model release form as a PDF in the email
 * 
 * @param string $email      This param has the email address
 * @param string $legal_name This param has the models legal name
 * 
 * @access public
 * 
 * @return mixed
 */
function SendUserUpdatedPdfemail(string $email, string $legal_name)
{
  $mail = include "mailer.php";
  $pdfAttachment = "/Applications/MAMP/htdocs/model-release-form/model-form/update_model_release_form/$legal_name-Model-Release-Form.pdf";
  $mail->setFrom("hoyrod1@gmail.com");
  $mail->FromName = "STC media inc";
  $mail->addReplyTo('hoyrod1@gmail.com');
  $mail->addAddress($email);
  $mail->addAttachment($pdfAttachment, "$legal_name-Model-Release-Form.pdf");
  $mail->Subject  = "Model Relase Form pdf copy";
  
  $mail->Body     = <<<END
  A copy of your model release form has been attached to this email.
  END;
  
  try {
      $mail->send();
      $_SESSION["update_model_release_success"] = "Your model release has been updated and emailed from send_user_updated_pdf_email";
      header("Location: ../index.php");
  } catch (Exception $e) {
      $_SESSION["update_model_release_error"] = "Your model release has not been emailed: {$mail->ErrorInfo}";
      header("Location: ../index.php");
  }
}
//=================================================================================//