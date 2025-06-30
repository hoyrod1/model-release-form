<?php
/**
 * * @file
 * php version 8.2
 * Reset Password Processor file
 * 
 * @category Reset_Password_Processor
 * @package  Reset_Password_Processor_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/reset-password/reset_password_processor.php
 */
//================================================================================//
// START SESSION TO CATCH ANY LOGIN ERRORS //
include_once "../../includes/session_inc.php";
ob_start();
session_set_cookie_params(["SameSite" => "Strict"]); //none, lax, strict
session_set_cookie_params(["Secure" => "true"]); //false, true
session_set_cookie_params(["HttpOnly" => "true"]); //false, true<?php
/**
 * * @file
 * php version 8.2
 * Signin Page for Model Release Form
 * 
 * @category Model-Signin-Configuration
 * @package  Procedural_Signin_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/login-page/model_signin.php
 */
//*=========================================================================*//
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["recover"])) {
  if (isset($_SESSION['token']) && isset($_POST['token_gen']) == $_SESSION['token']) {
    //*----------------------------------------------------------------------*//
    include "../../includes/sanitize_function.php";
    //*----------------------------------------------------------------------*//
    $filtered_Email =    testInput($_POST["email"]);
    var_dump($filtered_Email);
    //*----------------------------------------------------------------------*//
    // try {
    // } catch (PDOException $e) {
    //     die("Connected Failed: " . $e->getMessage());
    // }

  } else {
    $_SESSION['reset_password_error'] = "Token generated is not correct";
    header("Location: reset-password.php");
    die();
  }
  
} else {
    $_SESSION['reset_password_error'] = "You must enter your email before proceeding";
    header("Location: reset-password.php");
    die();
}