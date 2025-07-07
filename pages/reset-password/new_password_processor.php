<?php
/**
 * * @file
 * php version 8.2
 * New Password Processor file
 * 
 * @category New_Password_Processor
 * @package  New_Password_Processor_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/reset-password/new_password_processor.php
 */
//======================================================================================//
date_default_timezone_set('America/New_York');
// START SESSION TO CATCH ANY LOGIN ERRORS //
include_once "../../includes/session_inc.php";
//*=======================================================================================*//
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['token'])) {
            //*---------------------------------------------------------------------------------*//
            include "../../includes/sanitize_function.php";
            //*---------------------------------------------------------------------------------*//
            $filtered_password         = testInput($_POST['password']);
            $filtered_confirm_password = testInput($_POST['confirm_password']);
            $filtered_token            = testInput($_POST['token']);
            try {
              // INCLUDE THE DATBASE CONNECTION //
              include_once "../../includes/database.procedural.inc.php";
              // INCLUDE THE NEW PASSWORD PROCESSOR MODEL THAT INTERACTS WITH THE DATABSE //
              include_once "../model/new_password_processor_model.php";
              // INCLUDE THE NEW PASSWORD PROCESSOR CONTROLLER THAT HANDLES USERS INPUT //
              include_once "../controller/new_password_processor_controller.php";
              //---------------------------------------------------------------------------------//
                // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY
                if (Is_Input_Field_empty($filtered_password, $filtered_confirm_password)) {
                  $_SESSION['reset_password_error'] = "Input fields can not be empty";
                  header("Location: reset-password-form.php");
                  die();
              }
              //------------------------------------------------------------------------------------------------//
              // CHECK IF PASSWORD AND CONFIRM PASSWORD MATCHES
              if (Is_Password_match($filtered_password, $filtered_confirm_password)) {
                $_SESSION['reset_password_error'] = "Your passwords do not match";
                header("Location: reset-password-form.php");
                die();
              }
              //------------------------------------------------------------------------------------------------//
              // CHECK IF PASSWORD IS VALID
              if (Is_Password_Length_valid($filtered_password, $filtered_confirm_password)) {
                $_SESSION['reset_password_error'] = "Your password must contain at least 6-24 letters and numbers.";
                header("Location: reset-password-form.php");
                die();
              }
              //------------------------------------------------------------------------------------------------//
              // CHECK IF PASSWORD IS VALID
              if (Is_User_Password_valid($filtered_password)) {
                $_SESSION['reset_password_error'] = "Your password must contain at least one number and letter.";
                header("Location: reset-password-form.php");
                die();
              }
              //------------------------------------------------------------------------------------------------//
              // TRY TO SET THE USERS NEW PASSWORD USING THE STORED RESET TOKEN
              if (Set_New_Password_controller($pdo, $filtered_token, $filtered_password)) {
                $_SESSION['reset_password_error'] = "There was an error changing your password";
                header("Location: reset-password.php");
                die();
              }
              //------------------------------------------------------------------------------------------------//
              // 
                $_SESSION['login_success'] = "Your password has successfully been changed";
                header("Location: ../login-page/model-login.php");
                die();
              //------------------------------------------------------------------------------------------------//
            } catch (PDOException $e) {
                die("Connected Failed: " . $e->getMessage());
            }
    
  } else {
      $_SESSION['reset_password_error'] = "Please enter your email to validate and reset your password";
      header("Location: reset-password.php");
      die();
  }
  //*================================================================================================*//