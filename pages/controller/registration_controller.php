<?php
/**
 * * @file
 * php version 8.2
 * Procedural registration controller Configuration file for Model Release Form
 * 
 * @category Registration_Controller
 * @package  Procedural_Registration_Controller_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/model/registration_controller.php
 */
declare(strict_types=1);
//*=========================================================================*//

//*=========================================================================*//
/**
 * The Is_Input_empty function checks if all the input fields are not empty
 * 
 * @param string $firstname        This param has the first name
 * @param string $lastname         This param has the last name
 * @param string $contact_number   This param has the  contact number
 * @param string $email            This param has the email
 * @param string $username         This param has the users username
 * @param string $password         This param has the password
 * @param string $confirm_password This param has the confirmed password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Input_empty(string $firstname, string $lastname, string $contact_number, string $email, string $username, string $password, string $confirm_password)
{
    if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password) || empty($confirm_password) || empty($contact_number)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//=================================================================================//
//*----------------------- SANITATION & VALIDATION SECTION -----------------------*//
//=================================================================================//

//*=========================================================================*//
/**
 * 1. The Is_Name_valid function checks if the first and lastname valid
 * 
 * @param string $firstname This param has the first name
 * @param string $lastname  This param has the last name
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Name_valid(string $firstname, string $lastname)
{
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_firstName = filter_var($firstname, FILTER_SANITIZE_STRING);
    $filtered_lastName = filter_var($lastname, FILTER_SANITIZE_STRING);
    //----------------------------------------------------------------------//
    if (!preg_match("/^[a-zA-Z-'\. ]*$/", $filtered_firstName) || !preg_match("/^[a-zA-Z-'\. ]*$/", $filtered_lastName)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

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
    if (!filter_var($filtered_Email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * 3. The Is_Contact_valid function checks if phone number entered is valid
 * 
 * @param string $contact_number This param has the contact number
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Contact_valid(string $contact_number)
{
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_Number = filter_var($contact_number, FILTER_SANITIZE_STRING);
    //----------------------------------------------------------------------//
    if (!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $filtered_Number)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * 4. The Is_Username_valid function checks if the username entered is valid
 * 
 * @param string $user_name This param has the users username
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Username_valid(string $user_name)
{
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_Username = filter_var($user_name, FILTER_SANITIZE_STRING);
    //----------------------------------------------------------------------//
    if (!preg_match("/^[0-9A-Za-z]{6,16}$/", $filtered_Username)) {
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
    if (strlen($filtered_Password) < 6 || strlen($filtered_Password) > 24) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
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
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_Password = filter_var($password, FILTER_SANITIZE_STRING);
    $filtered_ConPassword = filter_var($con_password, FILTER_SANITIZE_STRING);
    //----------------------------------------------------------------------//
    if ($filtered_Password !== $filtered_ConPassword) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//
//----------------------------------------------------------------------------------------------------------//
//*=========================================================================*//
/**
 * The Is_Username_taken function verifies if a username is already taken
 * 
 * @param object $pdo      This param has the PDO connection
 * @param string $username This param has the users username
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Username_taken(object $pdo, string $username)
{
    if (Get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * The Is_Email_taken function verifies if the email is already being used
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Email_taken(object $pdo, string $email)
{
    if (Get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * The Register_User_controller function sends the users data to be registered
 * 
 * @param object $pdo            This param has the PDO connection
 * @param string $firstname      This param has the first name
 * @param string $lastname       This param has the last name
 * @param string $email          This param has the email
 * @param string $contact_number This param has the contact number
 * @param string $username       This param has the users username
 * @param string $password       This param has the password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Register_User_controller(object $pdo, string $firstname, string $lastname, string $email, string $contact_number, string $username, string $password)
{
    if (Register_User_model($pdo, $firstname, $lastname, $email, $contact_number, $username, $password)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//
