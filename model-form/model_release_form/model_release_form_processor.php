<?php
/**
 * * @file
 * php version 8.2
 * Model Release Form Processor Configuration file
 * 
 * @category Model_Release_Form_Processor
 * @package  Model_Release_Form_Processor_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/model_release_form/model_release_form_processor.php
 */
date_default_timezone_set('America/New_York');
//*--------------------------------------------------------------------------*//
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    //*----------------------------------------------------------------------*//
    include "../../includes/sanitize_function.php";
    //*----------------------------------------------------------------------*//
    $producer_name     = testInput($_POST["producer-name"]);
    $model_name        = testInput($_POST["model-name"]);
    $model_email       = testInput($_POST["model-email"]);
    $date_of_shoot     = testInput($_POST["date-of-shoot"]);
    $location_of_shoot = testInput($_POST["location-of-shoot"]);
    $payment_amount    = testInput($_POST["payment-amount"]);
    $legal_name        = testInput($_POST["legal-name"]);
    $social_security   = testInput($_POST["social-security"]);
    $address           = testInput($_POST["address"]);
    $city              = testInput($_POST["city"]);
    $state             = testInput($_POST["state"]);
    $zip_code          = testInput($_POST["zip-code"]);
    $country           = testInput($_POST["country"]);
    //*----------------------------------------------------------------------*//
    
    //*----------------------------------------------------------------------*//
    try 
    {
        // START SESSION TO CATCH ANY REGISTRATION ERRORS //
        include_once "../../includes/session_inc.php";
        // INCLUDE THE DATBASE CONNECTION //
        include_once "../../includes/database.procedural.inc.php";
        // INCLUDE THE REGISTRATION MODEL THAT INTERACTS WITH THE DATABSE //
        include_once "../model/model_release_model.php";
        // INCLUDE THE REGISTRATION CONTROLLER THAT HANDLES USER INPUT //
        include_once "../controller/model_release_controller.php";
        // INCLUDE THE generateModelReleaseToPDF TO GENERATE A PDF FILE //
        include_once "../generateModelReleaseToPDF/generateFirstModelReleaseToPDF.php";
        // INCLUDE THE send_email.php FILE TO SEND EMAIL TO USER //
        include_once "../generateModelReleaseToPDF/emailNewModelReleaseForm.php";

        // ERROR HANDLERS ARRAY //
        // $errors = [];
        // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY
        if (Is_Input_empty(
            $producer_name, // done
            $model_name, // done
            $model_email, // done
            $date_of_shoot, // done
            $location_of_shoot, 
            $payment_amount, 
            $legal_name, // done
            $social_security, // done 
            $address, 
            $city, 
            $state, 
            $zip_code,
            $country
        )
        ) {
            $_SESSION["model_release_error"] = "Fill in all fields";
            header("Location: model_release_form.php");
            die();
        }
        //------------------------------------------------------------------------------------------------//
        // CHECKS IF THE PRODUCERS NAME CONTAIN VALID DATA
        if (Is_Producer_Name_valid($producer_name)) {
            $_SESSION["model_release_error"] = "Please use letters, hyphens and periods in the producers name";
            header("Location: model_release_form.php");
            die();
        }
        //------------------------------------------------------------------------------------------------//
        // CHECKS IF THE MODELS STAGE NAME CONTAIN VALID DATA
        if (Is_Model_Name_valid($model_name)) {
            $_SESSION["model_release_error"] = "Please use letters, hyphens and periods in the model name";
            header("Location: model_release_form.php");
            die();
        }
        //------------------------------------------------------------------------------------------------//
        // CHECKS IF THE MODELS STAGE NAME CONTAIN VALID DATA
        if (Is_Legal_Name_valid($legal_name)) {
            $_SESSION["model_release_error"] = "Please use letters, hyphens and periods in the legal name";
            header("Location: model_release_form.php");
            die();
        }
        // ------------------------------------------------------------------------------------------------//
        // CHECK IF EMAIL IS VALID 
        if (Is_Email_valid($model_email)) {
            $_SESSION["model_release_error"] = "Invalid email format";
            header("Location: model_release_form.php");
            die();
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF CONTACT NUMBER IS VALID
        if (Is_SocialSecurity_valid($social_security)) {
            $_SESSION["model_release_error"] = "Please only use hyphens between your social security numbers (xxx-xx-xxxx)";
            header("Location: model_release_form.php");
            die();
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF CONTACT NUMBER IS VALID
        if (Is_Payment_amount($payment_amount)) {
            $_SESSION["model_release_error"] = "Please only enter number, commas and periods";
            header("Location: model_release_form.php");
            die();
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF THERE ARE ANY ERRORS 
        // if ($errors) {
        //     $_SESSION["model_release_error"] = $errors;
        //     header("Location: model_release_form.php");
        //     die("Query Failed: " . $e->getMessage());
        // }
        //------------------------------------------------------------------------------------------------//
        
        //------------------------------------------------------------------------------------------------//
        // START THE PROCCESS OF SAVING THE MODEL RELEASE FORM INTO THE DATABASE
        $results = Signed_ModelRelease_Form_controller(
            $pdo, 
            $producer_name, 
            $model_name, 
            $model_email, 
            $date_of_shoot, 
            $location_of_shoot, 
            $payment_amount, 
            $legal_name, 
            $social_security, 
            $address, 
            $city, 
            $state, 
            $zip_code,
            $country
        );

        if ($results) {
            generateFirstModelReleaseToPDF(
                $producer_name, 
                $model_name, 
                $model_email, 
                $date_of_shoot, 
                $location_of_shoot, 
                $payment_amount, 
                $legal_name, 
                $social_security, 
                $address, 
                $city, 
                $state, 
                $zip_code,
                $country
                );
            EmailNewModelReleaseForm($model_email, $legal_name);
            $_SESSION["model_release_success"] = "Your model release has been saved and emailed";
            header("Location: ../index.php");
            $pdo = null;
            $stmt = null;
            die();       
        } else {
            $_SESSION["model_release_error"] = "There was problem saving your model release form: {$e->getMessage()}";
            header("Location: model_release_form.php");
        }
    }
    catch(PDOException $e) 
    {
        die("Connected Failed: " . $e->getMessage());
    }
    //*----------------------------------------------------------------------*//
} else {
    header("Location: ../index.php");
    die();
}

