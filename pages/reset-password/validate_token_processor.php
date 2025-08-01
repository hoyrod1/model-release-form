<?php
/**
 * * @file
 * php version 8.2
 * Validate Token Processor For Model Release Form
 * 
 * @category Validate_Token_Processor
 * @package  Validate_Token_Processor_Configuration_Page
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/reset-password/validate_token_processor.php
 */
//=========================================================================================//
date_default_timezone_set('America/New_York');
// START SESSION TO CATCH ANY LOGIN ERRORS //
include_once "../../includes/session_inc.php";
//*=======================================================================================*//
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['validate_token']) && isset($_POST['email']) && isset($_POST['token'])) {
            //*---------------------------------------------------------------------------------*//
            include "../../includes/sanitize_function.php";
            //*---------------------------------------------------------------------------------*//
            $filtered_email      = testInput($_POST['email']);
            $filtered_token      = testInput($_POST['token']);
            //*---------------------------------------------------------------------------------*//
            try {
              // INCLUDE THE DATBASE CONNECTION //
              include_once "../../includes/database.procedural.inc.php";
              // INCLUDE THE LOGIN MODEL THAT INTERACTS WITH THE DATABSE //
              include_once "../model/validate_token_model.php";
              // INCLUDE THE LOGIN CONTROLLER THAT HANDLES USER INPUT //
              include_once "../controller/validate_token_controller.php";
              //---------------------------------------------------------------------------------//
              if (Is_Input_Empty_controller($filtered_email)) {
                  $_SESSION['reset_password_error'] = "Invalid email format";
                  header("Location: reset-password.php");
                  die();
              }
              //---------------------------------------------------------------------------------//
              // CHECK IF EMAIL IS VALID
              if (Is_Email_Valid_controller($filtered_email)) {
                  $_SESSION['reset_password_error'] = "Invalid email format";
                  header("Location: reset-password.php");
                  die();
              }
              //---------------------------------------------------------------------------------//
              // CHECK IF THE USERS DATA EXIST AND CAN BE RETRIEVED
              if (Get_User_Email_controller($pdo, $filtered_email)) {
                  $_SESSION['reset_password_error'] = "There was a problem retrieveing your data";
                  header("Location: reset-password.php");
                  die();
              }
              //---------------------------------------------------------------------------------//
              // RETRIEVE USERS DATA FROM DATABASE
              $user_results = Get_User_Email_model($pdo, $filtered_email);
              $reset_token_time = strtotime($user_results["expired_reset_token"]);
              //---------------------------------------------------------------------------------//
              // CHECK IF TOKEN HAS EXPIRED
              if ($reset_token_time <= time()) {
                $_SESSION['reset_password_error'] = "token has expired";
                header("Location: reset-password.php");
                die();
              }
              //---------------------------------------------------------------------------------//
              // IF TOKEN HAS NOT EXPIRED REDIRECT TO reset-password-form.php
              $user_token = $user_results["reset_hashed_token"];
              $_SESSION['reset_password_success'] = "Create your new password";
              header("Location: reset-password-form.php?token=$user_token");
              die();
            } catch (PDOException $e) {
                die("Connected Failed: " . $e->getMessage());
            }
    
  } else {
      $_SESSION['reset_password_error'] = "Please enter your email to validate and reset your password";
      header("Location: reset-password.php");
      die();
  }
  //*================================================================================================*//