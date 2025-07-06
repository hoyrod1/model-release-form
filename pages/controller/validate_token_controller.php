<?php
/**
 * * @file
 * php version 8.2
 * Validate Token Controller For Model Release Form
 * 
 * @category Validate_Token_Controller
 * @package  Validate_Token_Controller_Configuration_Page
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/controller/validate_token_controller.php
 */
//================================================================================//
//*=========================================================================*//

//=================================================================================//
/**
 * The Is_Input_Empty_controller function checks if the input field is empty
 * 
 * @param string $email This param has the email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Input_Empty_controller(string $email) {
  if (empty($email)) {
      return true;
  } else {
      return false;
  }
}
//*===============================================================================*//

//=================================================================================//
/**
 * 2. The Is_Email_Valid_controller function checks if email entered is valid
 * 
 * @param string $email This param has the email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Email_Valid_controller(string $email)
{
    if (!preg_match("/[a-zA-Z0-9._]{3,}@[a-zA-Z0-9._]{3,}.{1}[a-zA-Z0-9._]{2,}/", $email)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//
//*===============================================================================*//
/**
 * The Is_User_Token_Valid_controller checks if the token in URL is valid returns true
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $token This param has the token from the URL
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_User_Token_Valid_controller(object $pdo, string $token)
{
  if (!Is_User_Token_Valid_model($pdo, $token)) {
      return true;
  } else {
      return false;
  }
}
//*===============================================================================*//

//*===============================================================================*//
/**
 * The Get_User_Email_controller function queries the users email from the database
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Get_User_Email_controller(object $pdo, string $email)
{
    if (!Get_User_Email_model($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//