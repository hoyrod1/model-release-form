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
 * The Is_Input_empty function checks if all the input fields are empty
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
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_Email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //----------------------------------------------------------------------//
    if (!preg_match("/[a-zA-Z0-9._]{3,}@[a-zA-Z0-9._]{3,}.{1}[a-zA-Z0-9._]{2,}/", $filtered_Email)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * 5. The Is_Password_valid function checks if the password entered is valid
 * 
 * @param string $password This param has the password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Password_valid(string $password)
{
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_Password = filter_var($password, FILTER_SANITIZE_STRING);
    //----------------------------------------------------------------------//
    if (!preg_match("/^[a-zA-Z,0-9_]*$/", $filtered_Password)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * The Get_User_Email_controller function checks if email exist in the database
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Get_User_Email_controller(object $pdo, string $email)
{
    if (Get_User_Email_model($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//
