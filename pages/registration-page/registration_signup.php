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
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    //*----------------------------------------------------------------------*//
    include "../../includes/sanitize_function.php";
    //*----------------------------------------------------------------------*//
    $first_name =     testInput($_POST["first_name"]);
    $last_name =      testInput($_POST["last_name"]);
    $contact_number = testInput($_POST["contact_number"]);
    $email =          testInput($_POST["email"]);
    $model_name =     testInput($_POST["model-name"]);
    $pass_word =      testInput($_POST["password"]);
    $confirm_pass =   testInput($_POST["confirm_pass"]);
    //*----------------------------------------------------------------------*//

    //*----------------------------------------------------------------------*//
    try 
    {
        // START SESSION TO CATCH ANY REGISTRATION ERRORS //
        include_once "../../includes/session_inc.php";
        // INCLUDE THE DATBASE CONNECTION //
        include_once "../../includes/database.procedural.inc.php";
        // INCLUDE THE REGISTRATION MODEL THAT INTERACTS WITH THE DATABSE //
        include_once "../model/registration_model.php";
        // INCLUDE THE REGISTRATION CONTROLLER THAT HANDLES USER INPUT //
        include_once "../controller/registration_controller.php";

        // ERROR HANDLERS ARRAY //
        $errors = [];
        // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY
        if (Is_Input_empty(
            $first_name, 
            $last_name, 
            $contact_number, 
            $email, 
            $model_name, 
            $pass_word, 
            $confirm_pass
        )
        ) {
            $errors["empty_input"] = "Fill in all fields";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF THE FIRST AND LAST NAME CONTAIN VALID DATA
        if (Is_Name_valid($first_name, $last_name)) {
            $errors["invalid_name"] = "Please use letters, hyphens and periods in your first and last name";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF CONTACT NUMBER IS VALID
        if (Is_Contact_valid($contact_number)) {
            $errors["invalid_number"] = "Please only use numbers";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF EMAIL IS VALID
        if (Is_Email_valid($email)) {
            $errors["invalid_email"] = "Invalid email format";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF USERNAME IS VALID
        if (Is_Model_Name_valid($model_name)) {
            $errors["model_name"] = "Please enter 6-16 letters and numbers as a model name";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF PASSWORD IS VALID
        if (Is_Password_valid($pass_word)) {
            $errors["invalid_password"] = "Your password must contain 6-24 characters, at least one number and one letter and no spaces.";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF PASSWORD AND CONFIRM PASSWORD MATCHES
        if (Is_Password_match($pass_word, $confirm_pass)) {
            $errors["nonmatching-password"] = "Your passwords do not match";
        }
        //------------------------------------------------------------------------------------------------//

        //------------------------------------------------------------------------------------------------//
        // CHECK IF USERNAME ALREADY EXIST
        if (Is_Model_Name_taken($pdo, $model_name)) {
            $errors["model_name_taken"] = "This Model name is already being used";
        }
        // CHECK IF EMAIL ALREADY EXIST
        if (Is_Email_taken($pdo, $email)) {
            $errors["email_taken"] = "This email is already being used";
        }
        // CHECK IF THERE ARE ANY ERRORS 
        if ($errors) {
            $_SESSION["registration_error"] = $errors;
            header("Location: ../registration-page/model-registration.php");
            die("Query Failed: " . $e->getMessage());
        }
        //------------------------------------------------------------------------------------------------//

        //------------------------------------------------------------------------------------------------//
        // START THE PROCCESS OF REGISTERING THE USER
        $register_test = Register_User_controller(
            $pdo, 
            $first_name, 
            $last_name, 
            $email, 
            $contact_number, 
            $model_name, 
            $pass_word
        );

        if ($register_test) {
            $_SESSION["registration_success"] = "You have successfully registered";
            header("Location: ../login-page/model-login.php");
            $pdo = null;
            $stmt = null;
            die();       
        } else {
            $errors["registration_failed"] = "There was an issue with registeration";
            header("Location: ../registration-page/model-registration.php");
            die("Registeration Failed: " . $e->getMessage());
        }
        //------------------------------------------------------------------------------------------------//
    }
    catch(PDOException $e) 
    {
        die("Connected Failed: " . $e->getMessage());
    }
    //*----------------------------------------------------------------------*//
} else {
    header("Location: ../registration-page/model-registration.php");
    die();
}
