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
    $query = "SELECT user_name FROM model_registration WHERE user_name = :username";
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
    $stmt->bindValue(":username", $email, PDO::PARAM_STR);;
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
//*=========================================================================*//