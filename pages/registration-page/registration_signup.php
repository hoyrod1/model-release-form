<?php
/**
 * * @file
 * php version 8.2
 * Procedural registration Configuration file for Model Release Form
 * 
 * @category Registration_Signup
 * @package  Procedural_Registration_Signup_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/registration-page/registration_signup.php
 */
//*=========================================================================*//
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //*----------------------------------------------------------------------*//
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_pass = $_POST["confirm_pass"];
    //*----------------------------------------------------------------------*//

    //*----------------------------------------------------------------------*//
    try 
    {
        // INCLUDE THE DATBASE CONNECTION //
        include_once "../../includes/database.procedural.inc.php";
        // INCLUDE THE REGISTRATION MODEL THAT INTERACTS WITH THE DATABSE //
        include_once "../model/registration_model.php";
        // INCLUDE THE REGISTRATION CONTROLLER THAT HANDLES USER INPUT //
        include_once "../controller/registration_controller.php";
        // ERROR HANDLERS ARRAY //
        $errors = [];
        // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY //
        if (Is_Input_empty($first_name, $last_name, $email, $username, $password, $confirm_pass)) {
            $errors["empty_input"] = "Fill in all fields";
        }
        // CHECK IF ALL SANITIZED INPUT FIELDS CONTAIN VALID DATA
        if (Is_Input_valid($first_name, $last_name, $email, $username, $password, $confirm_pass)) {
            $errors["invalid_email"] = "Invalid email used";
        }
        // CHECK IF USERNAME ALREADY EXIST
        if (Is_Username_taken($pdo, $username)) {
            $errors["username_taken"] = "This username has already been taken";
        }
        // CHECK IF EMAIL ALREADY EXIST
        if (Is_Email_taken($pdo, $email)) {
            $errors["email_taken"] = "This email is already being used";
        }
        // START SESSION TO CATCH ANY REGISTRATION ERRORS //
        include_once "../../includes/session_inc.php";
        if ($errors) {
            $_SESSION["signup_error"] = $errors;
            header("Location: /model-registration.php");
            die();
        }    
    }
    catch(PDOException $e) 
    {
        die("Connected Failed: " . $e->getMessage());
    }
    //*----------------------------------------------------------------------*//
} else {
    header("Location: /model-registration.php");
    die();
}
