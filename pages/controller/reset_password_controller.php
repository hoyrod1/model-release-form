<?php
/**
 * * @file
 * php version 8.2
 * Reset Password Controller Configuration file
 * 
 * @category Reset_Password_Controller
 * @package  Reset_Password_Controller_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/controller/reset_password_controller.php
 */
declare(strict_types=1);
date_default_timezone_set('America/New_York');
//*========================================================================================*//

//*========================================================================================*//
/**
 * The Is_Input_Empty_controller function checks if the input field is empty
 * 
 * @param string $email             This param has the email
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
//*========================================================================================*//

//*========================================================================================*//
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
//*========================================================================================*//

//*========================================================================================*//
/**
 * The Does_Email_exist function verifies if the email exist on the database
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Does_Email_Exist_controller(object $pdo, string $email)
{
    if (!Does_Email_Exist_model($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
//*========================================================================================*//

//*========================================================================================*//
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
//*========================================================================================*//

//*========================================================================================*//
//*********************** BEGINNING FUNCTION TO RECOVER PASSWORD ***************************//
//*========================================================================================*//
/**
 * The Set_User_Validate_Code_controller function updates the users validate_mem
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Set_User_Validate_Token_controller(object $pdo, string $email)
{
    if (!Set_User_Validate_Token_model($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
//*========================================================================================*//