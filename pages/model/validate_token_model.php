<?php
/**
 * * @file
 * php version 8.2
 * Validate Token Model For Model Release Form
 * 
 * @category Validate_Token_Model
 * @package  Validate_Token_Model_Configuration_Page
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/model/validate_token_model.php
 */
//================================================================================//
//*==============================================================================*//
/**
 * The Is_User_Token_Valid_model function if the token in URL is valid 
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $token This param has the token from the URL
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_User_Token_Valid_model(object $pdo, string $token)
{
    $query = "SELECT * FROM model_registration WHERE reset_hashed_token = :token";
    $stmt  = $pdo->prepare($query);
    $stmt->bindValue(":token", $token, PDO::PARAM_STR);;
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