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
 * @link     https://model-release-form/model-form/generateModelReleaseToPDF/emailUpdatedModelReleaseForm.php
 */
declare(strict_types=1);
//------------------------------------------------------------------------------------------------------------//
// START SESSION TO USE THE MODELS INFO CACHED TO THE SESSION AT LOGIN AND CATCH ANY ERRORS OR SUCCESES       //
require_once "../../includes/session_inc.php";
// INCLUDE THE send_user_updated_pdf_email.php FILE TO EMAIL UPDATED MODEL RELEASE FORM TO MODEL //
require_once "../../send_user_updated_pdf_email.php";
//============================================================================================================//
/**
 * The EmailUpdatedModelReleaseForm funtion sends the models model release form as a PDF in the email
 * 
 * @param string $email      This param has the email address
 * @param string $legal_name This param has the models legal name
 * 
 * @access public
 * 
 * @return mixed
 */
function EmailUpdatedModelReleaseForm(string $email, string $legal_name)
{
  SendUserUpdatedPdfemail($email, $legal_name);
}
//============================================================================================================//