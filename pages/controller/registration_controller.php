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
//*----------------------------------- SANITATION & VALIDATION SECTION -----------------------------------*//
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
        var_dump(strlen($filtered_Password));
        var_dump($filtered_Password);
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

//*========================================================================================================*//
// /**
//  * The Is_Input_empty function checks if all the input fields are sanatized
//  * 
//  * @param string $firstname      This param has the first name
//  * @param string $lastname       This param has the last name
//  * @param string $contact_number This param has the contact number
//  * @param string $email          This param has the email
//  * @param string $user_name      This param has the users username
//  * @param string $password       This param has the password
//  * 
//  * @access public  
//  * 
//  * @return mixed
//  */
// function Is_Input_valid(string $firstname, string $lastname, string $contact_number, string $email, string $user_name, string $password)
// {
//     *--------------------------- SANATIZED DATA ---------------------------*//
//     $filtered_firstName = filter_var($firstname, FILTER_SANITIZE_STRING);
//     $filtered_lastName = filter_var($lastname, FILTER_SANITIZE_STRING);
//     $filtered_Number = filter_var($contact_number, FILTER_SANITIZE_STRING);
//     $filtered_Username = filter_var($user_name, FILTER_SANITIZE_STRING);
//     $filtered_Password = filter_var($password, FILTER_SANITIZE_STRING);
//     *----------------------------------------------------------------------*//
//     $input_err = [];
//     if (!preg_match("/^[a-zA-Z-'\. ]*$/", $filtered_firstName)) {
//         // $input_err["inval-fname"] = "Please use letters hyphens, spaces and periods";
//         return true;
//     } else {
//         return false;
//     }


//     if (!preg_match("/^[a-zA-Z-'\. ]*$/", $filtered_lastName)) {
//         // $input_err["inval-lname"] = "Please use letters hyphens, spaces and periods";
//         return true;
//     } else {
//         return false;
//     }


//     if (!preg_match("/[0-9]/", $filtered_Number)) {
//         // $input_err["inval-num"] = "Only numbers and hyphens";
//         return true;
//     } else {
//         return false;
//     }

  
//     if (!preg_match("/^[0-9A-Za-z]{6,16}$/", $filtered_Username)) {
//         // $input_err["inval-user"] = "Please enter between 6-16 letters and numbers";
//         return true;
//     } else {
//         return false;
//     }

//     if (strlen($filtered_Password) < 6) {
//         // $input_err["inval-less"] = "Your password must have at least 6 characters";
//         return true;
//     } else {
//         return false;
//     }


//     if (strlen($filtered_Password) > 24) {
//         // $input_err["inval-more"] = "Your password cant have more than 32 characters";
//         return true;
//     } else {
//         return false;
//     }

  
//     if (!preg_match("/[0-9]/", $filtered_Password)) {
//         // $input_err["inval-nonum"] = "Your password must have one number";
//         return true;
//     } else {
//         return false;
//     }


//     if (!preg_match("/[a-zA-Z]/", $filtered_Password)) {
//         // $input_err["inval-noletter"] = "Your password must have one letter";
//         return true;
//     } else {
//         return false;
//     }

//     $arr = array(
//       "firstname" => $firstname,
//       "lastname" => $lastname,
//       "contactnumber" => $contact_number,
//       "email" => $email,
//       "user_name" => $user_name,
//       "pass_word" => $password,
//     );

//     $filters = array(
//       "firstname" => FILTER_SANITIZE_STRING,
//       "lastname" => FILTER_SANITIZE_STRING,
//       "contactnumber" => FILTER_SANITIZE_STRING,
//       "email" => FILTER_SANITIZE_EMAIL,
//       "user_name" => FILTER_SANITIZE_STRING,
//       "pass_word" => FILTER_SANITIZE_STRING,
//     );

//     $filtered_input = filter_var_array($arr, $filters);
//     var_dump($filtered_input);
//     if (!$filtered_input) {
//         return true;
//     } else {
//         return false;
//     }
// }
//*========================================================================================================*//