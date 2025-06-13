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
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    //*----------------------------------------------------------------------*//
    $producer_name =     trim($_POST["producer-name"]);
    $model_name =        trim($_POST["model-name"]);
    $date_of_shoot =     trim($_POST["date-of-shoot"]);
    $email =             trim($_POST["email"]);
    $location_of_shoot = trim($_POST["location-of-shoot"]);
    $payment_amount =    trim($_POST["payment-amount"]);
    $print_name =        trim($_POST["print-name"]);
    $social_security =   trim($_POST["social-security"]);
    $address =           trim($_POST["address"]);
    $city =              trim($_POST["city"]);
    $state =             trim($_POST["state"]);
    $zip_code =          trim($_POST["zip-code"]);
    //*----------------------------------------------------------------------*//
    var_dump($producer_name);
    var_dump($model_name);
    var_dump($date_of_shoot);
    var_dump($email);
    var_dump($location_of_shoot);
    var_dump($payment_amount);
    var_dump($print_name);
    var_dump($social_security);
    var_dump($address);
    var_dump($city);
    var_dump($state);
    var_dump($zip_code);
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

