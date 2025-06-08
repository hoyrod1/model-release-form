<?php
/**
 * * @file
 * php version 8.2
 * Procedural login controller Configuration file for Model Release Form
 * 
 * @category Login_Controller
 * @package  Procedural_Login_Controller_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/controller/login_controller.php
 */
declare(strict_types=1);
//*=========================================================================*//

//*=========================================================================*//
/**
 * 1. The Is_Input_empty function checks if all the input fields are empty
 * 
 * @param string $email    This param has the email
 * @param string $password This param has the password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Input_empty(string $email, string $password)
{
    if (empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//===========================================================================//
//*-------------------- SANITATION & VALIDATION SECTION --------------------*//
//===========================================================================//

//*=========================================================================*//
/**
 * 2. The Is_Email_valid function checks if email entered is valid
 * 
 * @param string $email This param has the email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Email_valid(string $email)
{
    if (!preg_match("/[a-zA-Z0-9._]{3,}@[a-zA-Z0-9._]{3,}.{1}[a-zA-Z0-9._]{2,}/", $email)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * 3. The Is_Password_valid function checks if the password entered is valid
 * 
 * @param string $password This param has the password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Password_valid(string $password)
{
    if (!preg_match("/^[a-zA-Z,0-9_]*$/", $password)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//===========================================================================//
//*--------------------- QUERY DATABASE TO VERIFY USER ---------------------*//
//===========================================================================//

//*=========================================================================*//
/**
 * 1. The Does_Email_exist function checks if the email exist in the database
 * 
 * @param object $pdo           This param has the PDO connection
 * @param string $email_entered This param has the email entered
 * 
 * @access public  
 * 
 * @return mixed
 */
function Does_Email_Exist_controller(object $pdo, string $email_entered)
{
    if (!Does_Email_Exist_model($pdo, $email_entered)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * 2. The Is_Password_correct function checks if the password entered matches
 * 
 * @param string $password      This param has the password entered
 * @param string $user_password This param has the users password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Password_correct(string $password, string $user_password)
{
    if (!password_verify($password, $user_password)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//
