<?php
/**
 * * @file
 * php version 8.2
 * Reset Password model Configuration file for Model Release Form
 * 
 * @category Reset_Password_Model
 * @package  Reset_Password_Model_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/model/reset_password_model.php
 */
declare(strict_types=1);
date_default_timezone_set('America/New_York');
//*==============================================================================*//
/**
 * The Does_Email_Exist_model function queries the users email from the database
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Does_Email_Exist_model(object $pdo, string $email)
{
    $query = "SELECT email FROM model_registration WHERE email = :email";
    $stmt  = $pdo->prepare($query);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);;
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
//*==============================================================================*//

//*==============================================================================*//
/**
 * The Get_User_Email_model function queries the users email from the database
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Get_User_Email_model(object $pdo, string $email)
{
    $query = "SELECT * FROM model_registration WHERE email = :email";
    $stmt  = $pdo->prepare($query);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);;
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
//*==============================================================================*//

//================================================================================//
//************ BEGINNING FUNCTION TO RECOVER PASSWORD WITH RESET TOKEN ***********//
//================================================================================//
/**
 * The Set_User_Validate_Token_model function sets the users hashed token
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Set_User_Validate_Token_model(object $pdo, string $email)
{

    $token      = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);

    $exp_time   = date("Y-m-d H:i:s", time() + 60 * 10);

    $sql        = "UPDATE model_registration 
                   SET reset_hashed_token = :reset_hashed_token,
                       expired_reset_token = :expired_reset_token
                   WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':reset_hashed_token', $token_hash, PDO::PARAM_STR);
    $stmt->bindValue(':expired_reset_token', $exp_time, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $results = $stmt->execute();
    return $results;
}
//************* ENDING FUNCTION TO RECOVER PASSWORD WITH RESET TOKEN *************//
//================================================================================//

//================================================================================//
/**
 * This funtion returns boolean if the username exist or not
 * 
 * @param string $email   This param has the email address
 * @param string $subject This param has the email subject
 * @param string $msg     This param has the email message body
 * @param string $header  This param has the email header
 * 
 * @access public
 * 
 * @return mixed
 */
function sendEmail($email, $subject, $msg, $header)
{
    return mail($email, $subject, $msg, $header);

}
//================================================================================//
