<?php
/**
 * * @file
 * php version 8.2
 * New Password Processor Controller file
 * 
 * @category New_Password_Processor_Controller
 * @package  New_Password_Processor_Controller_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/reset-password/new_password_processor_controller.php
 */
//==============================================================================================//
declare(strict_types=1);
date_default_timezone_set('America/New_York');
//===============================================================================================//
//*------------------------------ BEGINNING OF VALIDATION SECTION ------------------------------*//
//===============================================================================================//
//===============================================================================================//
/**
 * The Is_Input_empty function checks if all the input fields are empty
 * 
 * @param string $password         This param has the password
 * @param string $confirm_password This param has the confirmed password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Input_Field_empty(string $password, string $confirm_password) {
  if (empty($password) || empty($confirm_password)) {
      return true;
  } else {
      return false;
  }
}
//===============================================================================================//

//===============================================================================================//
/**
 * 5. The Is_Password_match function checks if the password matches
 * 
 * @param string $password     This param has the password
 * @param string $con_password This param has the confirming password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Password_match(string $password, string $con_password)
{
    if ($password !== $con_password) {
        return true;
    } else {
        return false;
    }
}
//===============================================================================================//

//===============================================================================================//
/**
 * 5. The Is_Password_Length_valid function checks if the password has between 6 and 24 characters
 * 
 * @param string $password     This param has the password
 * @param string $con_password This param has the confirming password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Password_Length_valid(string $password, string $con_password)
{
    if (strlen($password) < 6 || strlen($password) > 24 || strlen($con_password) < 6 || strlen($con_password) > 24) {
        return true;
    } else {
        return false;
    }
}
//===============================================================================================//

//==============================================================================================//
/**
 * 4. The Is_User_Password_valid function checks if the password entered is valid
 * 
 * @param string $password This param has the users password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_User_Password_valid(string $password)
{
    if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\\d).+$/", $password)) {
        return true;
    } else {
        return false;
    }
}
//===============================================================================================//

//==============================================================================================//
//*------------------------------- ENDING OF VALIDATION SECTION -------------------------------*//
//==============================================================================================//

//==============================================================================================//
//*********************** BEGINNING FUNCTION TO RESET THE USERS PASSWORD ***********************//
//==============================================================================================//
/**
 * The Set_New_Password_controller function updates the users password
 * 
 * @param object $pdo      This param has the PDO connection
 * @param string $token    This param has the users stored users reset token
 * @param string $password This param has the users password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Set_New_Password_controller(object $pdo, string $token, string $password)
{
    if (!Set_New_Password_model($pdo, $token, $password)) {
        return true;
    } else {
        return false;
    }
}
//===============================================================================================//