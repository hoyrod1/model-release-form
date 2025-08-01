<?php
/**
 * * @file
 * php version 8.2
 * Email Model Release Model file
 * 
 * @category Email_Model_Release_Model
 * @package  Email_Model_Release_Model_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/generateModelReleaseToPDF/email_model_release_model.php
 */
declare(strict_types=1);
//============================================================================================================//

//*==========================================================================================================*//
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
    $query = "SELECT email FROM model_records WHERE email = :email";
    $stmt  = $pdo->prepare($query);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);;
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
//*==========================================================================================================*//

//*==========================================================================================================*//
/**
 * The Get_Model_Release_By_Email_model function queries the users email from the database
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Get_Model_Release_By_Email_model(object $pdo, string $email)
{
    $query = "SELECT * FROM model_records WHERE email = :email";
    $stmt  = $pdo->prepare($query);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);;
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
//*==========================================================================================================*//