<?php
/**
 * * @file
 * php version 8.2
 * Procedural registration model Configuration file for Model Release Form
 * 
 * @category Registration_Model
 * @package  Procedural_Registration_Model_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/model/registration_model.php
 */
declare(strict_types=1);
//*=========================================================================*//

//*=========================================================================*//
/**
 * The Get_username function queries the username from the database
 * 
 * @param object $pdo      This param has the PDO connection
 * @param string $username This param has the users username
 * 
 * @access public  
 * 
 * @return mixed
 */
function Get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM model_registration WHERE username = :username";
    $stmt  = $pdo->prepare($query);
    $stmt->bindValue(":username", $username, PDO::PARAM_STR);;
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * The Get_email function queries the users email from the database
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM model_registration WHERE email = :email";
    $stmt  = $pdo->prepare($query);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);;
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * The Register_user function registers the user to the database
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
function Register_User_model(object $pdo, string $firstname, string $lastname, string $email, string $contact_number, string $username, string $password)
{
    $reg_sql  = "INSERT INTO model_registration (firstname, lastname, email, contact_number, username, pass_word) VALUES(:firstname, :lastname, :email, :contact_number, :username, :pass_word)";
    $stmt = $pdo->prepare($reg_sql);
    $hash_options = [
        'cost' => 12
    ];
    $hash_password = password_hash($password, PASSWORD_BCRYPT, $hash_options);

    //BIND VARIABLE WITH INPUT PARAMETERS
    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':contact_number', $contact_number);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':pass_word', $hash_password);
    $execute  = $stmt->execute();
    return $execute;
}
//*=========================================================================*//