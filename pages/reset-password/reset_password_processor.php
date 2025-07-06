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
//======================================================================================//
date_default_timezone_set('America/New_York');
// START SESSION TO CATCH ANY LOGIN ERRORS //
include_once "../../includes/session_inc.php";
//*=====================================================================================*//

//*============== PASSWORD RESET PROCESSOR TESTING IF HASHED TOKEN EXPIRED =============*//
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["recover"])) {
    //*---------------------------------------------------------------------------------*//
    include "../../includes/sanitize_function.php";
    //*---------------------------------------------------------------------------------*//
    $filtered_Email =    testInput($_POST["email"]);
    //*---------------------------------------------------------------------------------*//
    try {
      // INCLUDE THE DATBASE CONNECTION //
      include_once "../../includes/database.procedural.inc.php";
      // INCLUDE THE LOGIN MODEL THAT INTERACTS WITH THE DATABSE //
      include_once "../model/reset_password_model.php";
      // INCLUDE THE LOGIN CONTROLLER THAT HANDLES USER INPUT //
      include_once "../controller/reset_password_controller.php";
      // INCLUDE THE send_email.php FILE TO SEND EMAIL TO USER //
      include_once "../../send_user_email.php";
      //---------------------------------------------------------------------------------//
        // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY
        if (Is_Input_Empty_controller($filtered_Email)) {
          $_SESSION['reset_password_error'] = "Please fill in the email field";
          header("Location: reset-password.php");
          die();
      }
      //---------------------------------------------------------------------------------//
      // CHECK IF EMAIL IS VALID
      if (Is_Email_Valid_controller($filtered_Email)) {
          $_SESSION['reset_password_error'] = "Invalid email format";
          header("Location: reset-password.php");
          die();
      }
      //---------------------------------------------------------------------------------//
      // CHECK IF EMAIL EXIST IN THE DATABASE
      if (Does_Email_Exist_controller($pdo, $filtered_Email)) {
          $_SESSION['reset_password_error'] = "There is no user with this email";
          header("Location: reset-password.php");
          die();
      }
      //---------------------------------------------------------------------------------//
      // SETS THE USERS validate_mem COLUMN WITH VERIFICATION CODE 
      if (Set_User_Validate_Token_controller($pdo, $filtered_Email)) {
          $_SESSION['reset_password_error'] = "The validate_mem column was not updated";
          header("Location: reset-password.php");
          die();
      }
      //---------------------------------------------------------------------------------//
      // CHECK IF THE USERS DATA EXIST AND CAN BE RETRIEVED
      if (Get_User_Email_controller($pdo, $filtered_Email)) {
          $_SESSION['reset_password_error'] = "There was a problem retrieveing your data";
          header("Location: reset-password.php");
          die();
      }
      //---------------------------------------------------------------------------------//
      // RETRIEVE THE USERS EMAIL AND VALIDATION CODE AND SEND A EMAIL TO THE USER
      $users_results      = Get_User_Email_model($pdo, $filtered_Email);
      $users_email        = $users_results["email"];
      $reset_hashed_token = $users_results["reset_hashed_token"];
      SendUseremail($users_email, $reset_hashed_token);
      //---------------------------------------------------------------------------------//

    } catch (PDOException $e) {
        die("Connected Failed: " . $e->getMessage());
    }

  
} else {
    $_SESSION['reset_password_error'] = "You must enter your email before proceeding";
    header("Location: reset-password.php");
    die();
}
//*=====================================================================================*//

//*=================== PASSWORD RESET PROCESSOR USING GENERATED TOKEN ==================*//
// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["recover"])) {
//   if (isset($_SESSION['token']) && isset($_POST['token_gen']) == $_SESSION['token']) {
//     //*---------------------------------------------------------------------------------*//
//     include "../../includes/sanitize_function.php";
//     //*---------------------------------------------------------------------------------*//
//     $filtered_Email =    testInput($_POST["email"]);
//     //*---------------------------------------------------------------------------------*//
//     try {
//       // INCLUDE THE DATBASE CONNECTION //
//       include_once "../../includes/database.procedural.inc.php";
//       // INCLUDE THE LOGIN MODEL THAT INTERACTS WITH THE DATABSE //
//       include_once "../model/reset_password_model.php";
//       // INCLUDE THE LOGIN CONTROLLER THAT HANDLES USER INPUT //
//       include_once "../controller/reset_password_controller.php";
//       // INCLUDE THE send_email.php FILE TO SEND EMAIL TO USER //
//       include_once "../../send_user_email.php";
//       //---------------------------------------------------------------------------------//
//         // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY
//         if (Is_Input_Empty_controller($filtered_Email)) {
//           $_SESSION['reset_password_error'] = "Please fill in the email field";
//           header("Location: reset-password.php");
//           die();
//       }
//       //---------------------------------------------------------------------------------//
//       // CHECK IF EMAIL IS VALID
//       if (Is_Email_Valid_controller($filtered_Email)) {
//           $_SESSION['reset_password_error'] = "Invalid email format";
//           header("Location: reset-password.php");
//           die();
//       }
//       //---------------------------------------------------------------------------------//
//       // CHECK IF EMAIL EXIST IN THE DATABASE
//       if (Does_Email_Exist_controller($pdo, $filtered_Email)) {
//           $_SESSION['reset_password_error'] = "There is no user with this email";
//           header("Location: reset-password.php");
//           die();
//       }
//       //---------------------------------------------------------------------------------//
//       // SETS THE USERS validate_mem COLUMN WITH VERIFICATION CODE 
//       if (Set_User_Validate_Code_controller($pdo, $filtered_Email)) {
//           $_SESSION['reset_password_error'] = "The validate_mem column was not updated";
//           header("Location: reset-password.php");
//           die();
//       }
//       //---------------------------------------------------------------------------------//
//       // CHECK IF THE USERS DATA EXIST AND CAN BE RETRIEVED
//       if (Get_User_Email_controller($pdo, $filtered_Email)) {
//           $_SESSION['reset_password_error'] = "There was a problem retrieveing your data";
//           header("Location: reset-password.php");
//           die();
//       }
//       //---------------------------------------------------------------------------------//
//       // RETRIEVE THE USERS EMAIL AND VALIDATION CODE AND SEND A EMAIL TO THE USER
//       $users_results = Get_User_Email_model($pdo, $filtered_Email);
//       $users_email = $users_results["email"];
//       $users_validate_mem = $users_results["validate_mem"];
//       $email_sent = SendUseremail($users_email, $users_validate_mem);
//       //---------------------------------------------------------------------------------//

//     } catch (PDOException $e) {
//         die("Connected Failed: " . $e->getMessage());
//     }

//   } else {
//     $_SESSION['reset_password_error'] = "Token generated is not correct";
//     header("Location: reset-password.php");
//     die();
//   }
  
// } else {
//     $_SESSION['reset_password_error'] = "You must enter your email before proceeding";
//     header("Location: reset-password.php");
//     die();
// }
//*=====================================================================================*//