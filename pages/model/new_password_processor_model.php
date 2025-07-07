<?php
/**
 * * @file
 * php version 8.2
 * New Password Processor Model file
 * 
 * @category New_Password_Processor_Model
 * @package  New_Password_Processor_Model_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/model/new_password_processor_model.php
 */
//================================================================================//
declare(strict_types=1);
//================================================================================//
//************************** FUNCTION TO CHANGE PASSWORD *************************//
//================================================================================//
/**
 * The Set_New_Password_model function sets the users new password
 * 
 * @param object $pdo      This param has the PDO connection
 * @param string $token    This param has the users email
 * @param string $password This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Set_New_Password_model(object $pdo, string $token, string $password)
{

    $sql = "UPDATE model_registration SET pass_word = :pass_word
            WHERE reset_hashed_token = :reset_hashed_token";
    $hash_options = [
        'cost' => 12
    ];
    $hash_password = password_hash($password, PASSWORD_BCRYPT, $hash_options);
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':reset_hashed_token', $token);
    $stmt->bindValue(':pass_word', $hash_password);
    $results = $stmt->execute();
    return $results;
}
//********************** ENDING FUNCTION TO CHANGE PASSWORD **********************//
//================================================================================//
