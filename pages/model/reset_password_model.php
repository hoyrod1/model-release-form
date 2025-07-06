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
 * The Set_User_Validate_Code_model function updates the users validate_mem
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
//*************** ENDING FUNCTION TO RECOVER PASSWORD WITH COOKIE  ***************//
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

//================================================================================//
//********** BEGINNING FUNCTION FOR VALIDATION CODE TO RESET PASSWORD ************//
// /**
//  * This function valadates the code sent to the user before setting the password
//  * 
//  * @access public  
//  * 
//  * @return void
//  */
// function validateCode()
// {
//     if ($_SERVER['REQUEST_METHOD'] == "POST") {
//         if (isset($_COOKIE['temp_code'])) {
//             if (isset($_GET['Email']) && isset($_GET['Code'])) {
//                 if (isset($_POST['validate_code'])) {
//                   //============== REQUIRE THE DATBASE CONNECTIO================//
//                   include_once "database.procedural.inc.php";
//                   include_once "sanitize_function.php";
//                   //=============================================================//
//                     $eMail   = $_GET['Email'];
//                     $code    = $_POST['token'];
//                     $sql_val_code = 'SELECT * FROM members WHERE validate_mem = "$code" AND email = "$eMail"';
//                     $result_sql_val_code = $pdo->prepare($sql_val_code);
//                     $results = $result_sql_val_code->execute();
//                     if ($results) {
//                         $cookieArrSet = [
//                             "expires" => time() + 1800,
//                             "path" => "/",
//                             "domain" => "kadenstcloud.com",
//                             "secure" => true,
//                             "httponly" => true,
//                             "samesite" => 'None'
//                            ];
//                         setcookie('resetpassword', $code, $cookieArrSet);
//                         header("location:/reset.php?Email=$eMail&Code=$code");
//                     } else {
//                         $_SESSION['recover_error'] = "Your validation code '.$code.' is incorrect";
//                         header("location: ../login-page/recover.php");
//                     }

//                 }
//             } else {
//                 $_SESSION['recover_error'] = "Your validation code has expired";
//                 header("location: ../login-page/recover.php");
//             }
//         } else {
//             $_SESSION['recover_error'] = "Please check the time";
//             header("location: ../login-page/recover.php");
//         }
//     }
// }
//************ ENDING FUNCTION FOR VALIDATION CODE TO RESET PASSWORD **************//
//=================================================================================//

//================================================================================//
//************* BEGINNING FUNCTION TO RECOVER PASSWORD WITH COOKIE ***************//
//================================================================================//
// /**
//  * The Set_User_Validate_Code_model function updates the users validate_mem
//  * 
//  * @param object $pdo   This param has the PDO connection
//  * @param string $email This param has the users email
//  * 
//  * @access public  
//  * 
//  * @return mixed
//  */
// function Set_User_Validate_Code_model(object $pdo, string $email)
// {
//     $val_code      = md5($email.microtime());
//     $val_query     = "UPDATE model_registration SET validate_mem = :val_Code WHERE email = :Email";
//     $val_query_pre = $pdo->prepare($val_query);
//     $val_query_pre->bindValue(':Email', $email);
//     $val_query_pre->bindValue(':val_Code', $val_code);
//     $results = $val_query_pre->execute();
//     $cookieArrSet = [
//         "expires" => time() + 1800,
//         "path" => "/",
//         "domain" => "model-release-form.com",
//         "secure" => true,
//         "httponly" => true,
//         "samesite" => 'None'
//        ];
//     // setcookie('temp_code', $val_code, $cookieArrSet);
//     setcookie('temp_code', $val_code, time() + 1800, "/");
//     return $results;
// }
//*************** ENDING FUNCTION TO RECOVER PASSWORD WITH COOKIE  ***************//
//================================================================================//
