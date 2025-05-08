<?php
/**
 * * @file
 * php version 8.2
 * Procedural registration model Configuration file for Model Release Form
 * 
 * @category Registration_Signup_Model
 * @package  Procedural_Registration_Signup_Configuration_Model
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
    $query = "SELECT username FROM users WHERE username = :username";
    $stmt  = $pdo->prepare($query);
    $stmt->bindValue(":username", $username, PDO::PARAM_STR);;
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
//*=========================================================================*//