<?php
/**
 * * @file
 * php version 8.2
 * Model Relase Form Model Configuration file
 * 
 * @category Model_Relase_Form_Model
 * @package  Model_Relase_Form_Model_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/model/model_release_model.php
 */
declare(strict_types=1);
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
 * @param string $model_name     This param has the users model name
 * @param string $password       This param has the password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Register_User_model(object $pdo, string $firstname, string $lastname, string $email, string $contact_number, string $model_name, string $password)
{
    $reg_sql  = "INSERT INTO model_registration (firstname, lastname, email, contact_number, model_name, pass_word) VALUES(:firstname, :lastname, :email, :contact_number, :model_name, :pass_word)";
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
    $stmt->bindValue(':model_name', $model_name);
    $stmt->bindValue(':pass_word', $hash_password);
    $execute  = $stmt->execute();
    return $execute;
}
//*=========================================================================*//
