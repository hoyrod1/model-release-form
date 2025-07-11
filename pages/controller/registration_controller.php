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
 * @link     https://model-release-form/pages/controller/registration_controller.php
 */
declare(strict_types=1);
//*===============================================================================*//

//=================================================================================//
//*----------------------- BEGINNING OF VALIDATION SECTION -----------------------*//
//=================================================================================//

//*===============================================================================*//
/**
 * The Is_Input_empty function checks if all the input fields are empty
 * 
 * @param string $firstname        This param has the first name
 * @param string $lastname         This param has the last name
 * @param string $contact_number   This param has the  contact number
 * @param string $email            This param has the email
 * @param string $model_name       This param has the users username
 * @param string $password         This param has the password
 * @param string $confirm_password This param has the confirmed password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Input_empty(
    string $firstname, 
    string $lastname, 
    string $contact_number, 
    string $email, 
    string $model_name, 
    string $password, 
    string $confirm_password
) {
    if (empty($firstname) 
        || empty($lastname) 
        || empty($email) 
        || empty($model_name) 
        || empty($password) 
        || empty($confirm_password) 
        || empty($contact_number)
    ) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//*===============================================================================*//
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
    if (!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $contact_number)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//*===============================================================================*//
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
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//*===============================================================================*//
/**
 * 4. The Is_Model_Name_valid function checks if the model name entered is valid
 * 
 * @param string $model_name This param has the users username
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Model_Name_valid(string $model_name)
{
    if (!preg_match("/^[0-9A-Za-z ]{5,16}$/", $model_name)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//*===============================================================================*//
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
    if (!preg_match("/^[a-zA-Z-'\. ]*$/", $firstname) 
        || !preg_match("/^[a-zA-Z-'\. ]*$/", $lastname)
    ) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//*===============================================================================*//
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
//*===============================================================================*//

//*===============================================================================*//
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
    if (strlen($password) < 6 || strlen($password) > 24) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//=================================================================================//
//*------------------------ ENDING OF VALIDATION SECTION -------------------------*//
//=================================================================================//

//=================================================================================//
//*------------------------- BEGINNING OF DATABASE QUERY -------------------------*//
//=================================================================================//

//*===============================================================================*//
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
//*===============================================================================*//

//*===============================================================================*//
/**
 * The Is_Model_Name_taken function verifies if the model name is already taken
 * 
 * @param object $pdo        This param has the PDO connection
 * @param string $model_name This param has the users username
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Model_Name_taken(object $pdo, string $model_name)
{
    if (Get_Model_name($pdo, $model_name)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//*===============================================================================*//
/**
 * The Register_User_controller function sends the users data to be registered
 * 
 * @param object $pdo            This param has the PDO connection
 * @param string $firstname      This param has the first name
 * @param string $lastname       This param has the last name
 * @param string $email          This param has the email
 * @param string $contact_number This param has the contact number
 * @param string $model_name     This param has the users username
 * @param string $password       This param has the password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Register_User_controller(
    object $pdo, 
    string $firstname, 
    string $lastname, 
    string $email, 
    string $contact_number, 
    string $model_name, 
    string $password
) {
    if (Register_User_model(
        $pdo, 
        $firstname, 
        $lastname, 
        $email, 
        $contact_number, 
        $model_name, 
        $password
    )
    ) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//
//=================================================================================//
//*--------------------------- ENDING OF DATABASE QUERY --------------------------*//
//=================================================================================//
