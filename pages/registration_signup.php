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
 * @link     https://model-release-form/pages/registration_signup.php
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

    //*--------------------------- SANATIZED DATA ---------------------------*//
    // $filtered_first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
    // $filtered_last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
    // $filtered_username = filter_var($username, FILTER_SANITIZE_STRING);
    // $filtered_password = filter_var($password, FILTER_SANITIZE_STRING);
    // $filtered_confirm_pass =  filter_var($confirm_pass, FILTER_SANITIZE_STRING);
    //*----------------------------------------------------------------------*//
    // echo $filtered_first_name;
    //*----------------------------------------------------------------------*//
    try 
    {
        include_once "../../includes/database.procedural.inc.php";
        include_once "../model/registration_model.php";
        include_once "../controller/registration_controller.php";
        // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY //
        if (Is_Input_empty($first_name, $last_name, $email, $username, $password, $confirm_pass)) {
            // code...
        }
        // CHECK IF ALL SANITIZED INPUT FIELDS CONTAIN VALID DATA
        if (Is_Input_valid($first_name, $last_name, $email, $username, $password, $confirm_pass)) {
            // code...
        }
        // CHECK IF USERNAME ALREADY EXIST
        if (Is_Username_taken($pdo, $username)) {
            // code...
        }
    }
    catch(PDOException $e) 
    {
        die("Connected Failed: " . $e->getMessage());
    }
    //*----------------------------------------------------------------------*//
} else {
    header("Location: ../model-registration.php");
    die();
}
