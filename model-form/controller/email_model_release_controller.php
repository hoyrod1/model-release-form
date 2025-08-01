<?php
/**
 * * @file
 * php version 8.2
 * Email Model Release Controller file
 * 
 * @category Email_Model_Release_Controller
 * @package  Email_Model_Release_Controller_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/generateModelReleaseToPDF/email_model_release_controller.php
 */
declare(strict_types=1);
//============================================================================================================//

//*==========================================================================================================*//
/**
 * The Does_Email_exist function verifies if the email exist on the database
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Does_Email_Exist_controller(object $pdo, string $email)
{
    if (!Does_Email_Exist_model($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
//*==========================================================================================================*//
//*==========================================================================================================*//
/**
 * The Get_Model_Release_By_Email_controller function queries the users email from the database
 * 
 * @param object $pdo   This param has the PDO connection
 * @param string $email This param has the users email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Get_Model_Release_By_Email_controller(object $pdo, string $email)
{
    if (!Get_Model_Release_By_Email_model($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
//*==========================================================================================================*//