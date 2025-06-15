<?php
/**
 * * @file
 * php version 8.2
 * Model Relase Form Processor Configuration file
 * 
 * @category Model_Relase_Form_Processor
 * @package  Model_Relase_Form_Processor_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/model_release_form_processor.php
 */
//*----------------------------------------------------------------------*//
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    //*----------------------------------------------------------------------*//
    include "../includes/sanitize_function.php";
    //*----------------------------------------------------------------------*//
    $producer_name =     testInput($_POST["producer-name"]);
    $model_name =        testInput($_POST["model-name"]);
    $date_of_shoot =     testInput($_POST["date-of-shoot"]);
    $email =             testInput($_POST["email"]);
    $location_of_shoot = testInput($_POST["location-of-shoot"]);
    $payment_amount =    testInput($_POST["payment-amount"]);
    $legal_name =        testInput($_POST["print-name"]);
    $social_security =   testInput($_POST["social-security"]);
    $address =           testInput($_POST["address"]);
    $city =              testInput($_POST["city"]);
    $state =             testInput($_POST["state"]);
    $zip_code =          testInput($_POST["zip-code"]);
    $country =           testInput($_POST["country"]);
    //*----------------------------------------------------------------------*//

    //*----------------------------------------------------------------------*//
    try 
    {
        // START SESSION TO CATCH ANY REGISTRATION ERRORS //
        include_once "../includes/session_inc.php";
        // INCLUDE THE DATBASE CONNECTION //
        include_once "../includes/database.procedural.inc.php";
        // INCLUDE THE REGISTRATION MODEL THAT INTERACTS WITH THE DATABSE //
        include_once "model/model_release_model.php";
        // INCLUDE THE REGISTRATION CONTROLLER THAT HANDLES USER INPUT //
        include_once "controller/model_release_controller.php";

        // ERROR HANDLERS ARRAY //
        $errors = [];
        // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY
        if (Is_Input_empty(
            $producer_name, // done
            $model_name, // done
            $date_of_shoot, 
            $email, // done
            $location_of_shoot, 
            $payment_amount, 
            $legal_name, // done
            $social_security, 
            $address, 
            $city, 
            $state, 
            $zip_code,
            $country
        )
        ) {
            $errors["empty_input"] = "Fill in all fields";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF THE FIRST AND LAST NAME CONTAIN VALID DATA
        if (Is_Name_valid(
            $producer_name, 
            $model_name,
            $legal_name
        )
        ) {
            $errors["invalid_names"] = "Please use letters, hyphens and periods in your first and last name";
        }
        // CHECK IF EMAIL IS VALID
        if (Is_Email_valid($email)) {
            $errors["invalid_email"] = "Invalid email format";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF CONTACT NUMBER IS VALID
        if (Is_SocialSecurity_valid($social_security)) {
            $errors["invalid_socialSecurity_number"] = "Please only use hyphens between the numbers (xxx-xx-xxxx)";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF THERE ARE ANY ERRORS 
        if ($errors) {
            $_SESSION["model_release_error"] = $errors;
            header("Location: ../model-form/index.php");
            die("Query Failed: " . $e->getMessage());
        }
    }
    catch(PDOException $e) 
    {
        die("Connected Failed: " . $e->getMessage());
    }
    //*----------------------------------------------------------------------*//
} else {
    header("Location: ../model-form/index.php");
    die();
}

