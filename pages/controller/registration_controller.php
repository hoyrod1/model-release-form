<?php
/**
 * * @file
 * php version 8.2
 * Procedural registration controller Configuration file for Model Release Form
 * 
 * @category Registration_Signup_Model
 * @package  Procedural_Registration_Signup_Configuration_Controller
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
 * @param string $email            This param has the email
 * @param string $username         This param has the users username
 * @param string $password         This param has the password
 * @param string $confirm_password This param has the confirmed password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Input_empty(string $firstname, string $lastname, string $email, string $username, string $password, string $confirm_password)
{
    if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * The Is_Input_empty function checks if all the input fields are sanatized
 * 
 * @param string $firstname    This param has the first name
 * @param string $lastname     This param has the last name
 * @param string $email        This param has the email
 * @param string $username     This param has the users username
 * @param string $password     This param has the password
 * @param string $confirm_pass This param has the confirmed password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Input_valid(string $firstname, string $lastname, string $email, string $username, string $password, string $confirm_pass)
{
    $arr = array(
      "firstname" => $firstname,
      "lastname" => $lastname,
      "email" => $email,
      "üsername" => $username,
      "password" => $password,
      "confirmpassword" => $confirm_pass
    );

    $filters = array(
      "firstname" => FILTER_SANITIZE_STRING,
      "lastname" => FILTER_SANITIZE_STRING,
      "email" => FILTER_SANITIZE_EMAIL,
      "username" => FILTER_SANITIZE_STRING,
      "password" => FILTER_SANITIZE_STRING,
      "confirmpassword" => FILTER_SANITIZE_STRING
    );

    $filtered_input = filter_var_array($arr, $filters);

    if (!$filtered_input) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

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