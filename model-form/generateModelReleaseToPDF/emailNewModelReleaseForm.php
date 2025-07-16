<?php
/**
 * * @file
 * php version 8.2
 * Email Model Release Form file
 * 
 * @category Email_Model_Release_Form
 * @package  Email_Model_Release_Form_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/generateModelReleaseToPDF/emailNewModelReleaseForm.php
 */
declare(strict_types=1);
//------------------------------------------------------------------------------------------------------------//
// START SESSION TO USE THE MODELS INFO CACHED TO THE SESSION AT LOGIN AND CATCH ANY ERRORS OR SUCCESES       //
require_once "../../includes/session_inc.php";
// INCLUDE THE send_email.php FILE TO SEND EMAIL TO USER //
require_once "../../send_user_new_pdf_email.php";
//============================================================================================================//
/**
 * The EmailNewModelReleaseForm funtion sends the models model release form as a PDF in the email
 * 
 * @param string $email      This param has the email address
 * @param string $legal_name This param has the models legal name
 * 
 * @access public
 * 
 * @return mixed
 */
function EmailNewModelReleaseForm(string $email, string $legal_name)
{
  SendUserNewPdfemail($email, $legal_name);
}
//============================================================================================================//