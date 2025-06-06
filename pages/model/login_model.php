<?php
/**
 * * @file
 * php version 8.2
 * Procedural login model Configuration file for Model Release Form
 * 
 * @category Login_Model
 * @package  Procedural_Login_Model_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/model/login_model.php
 */
declare(strict_types=1);
//*=========================================================================*//

//*=========================================================================*//
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
//*=========================================================================*//