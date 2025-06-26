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
//*----------------------------------------------------------------------*//
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    //*----------------------------------------------------------------------*//
    include "../../includes/sanitize_function.php";
    //*----------------------------------------------------------------------*//
    $producer_name =     testInput($_POST["producer-name"]);
    $model_name =        testInput($_POST["model-name"]);
    $email =             testInput($_POST["email"]);
    $date_of_shoot =     testInput($_POST["date-of-shoot"]);
    $location_of_shoot = testInput($_POST["location-of-shoot"]);
    $payment_amount =    testInput($_POST["payment-amount"]);
    $legal_name =        testInput($_POST["legal-name"]);
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
        include_once "../../includes/session_inc.php";
        // INCLUDE THE DATBASE CONNECTION //
        include_once "../../includes/database.procedural.inc.php";
        // INCLUDE THE REGISTRATION MODEL THAT INTERACTS WITH THE DATABSE //
        include_once "../model/model_release_model.php";
        // INCLUDE THE REGISTRATION CONTROLLER THAT HANDLES USER INPUT //
        include_once "../controller/model_release_controller.php";

        // ERROR HANDLERS ARRAY //
        $errors = [];
        // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY
        if (Is_Input_empty(
            $producer_name, // done
            $model_name, // done
            $email, // done
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
            $errors["invalid_socialSecurity_number"] = "Please only use hyphens between your social security numbers (xxx-xx-xxxx)";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF CONTACT NUMBER IS VALID
        if (Is_Payment_amount($payment_amount)) {
            $errors["invalid_payment_amount"] = "Please only enter number, commas and periods";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF THERE ARE ANY ERRORS 
        if ($errors) {
            $_SESSION["model_release_error"] = $errors;
            header("Location: model_release_form.php");
            die("Query Failed: " . $e->getMessage());
        }
        //------------------------------------------------------------------------------------------------//

        //------------------------------------------------------------------------------------------------//
        // START THE PROCCESS OF SAVING THE MODEL RELEASE FORM INTO THE DATABASE
        $results = Signed_ModelRelease_Form_controller(
            $pdo, 
            $producer_name, 
            $model_name, 
            $email, 
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
            $_SESSION["model_release_success"] = "Your model release was saved";
            header("Location: ../index.php");
            $pdo = null;
            $stmt = null;
            die();       
        } else {
            $errors["model_release_failed"] = "Your model release wasn't saved";
            header("Location: model_release_form.php");
            die("Registeration Failed: " . $e->getMessage());
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

