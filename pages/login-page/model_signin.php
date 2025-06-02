<?php
/**
 * * @file
 * php version 8.2
 * Signin Page for Model Release Form
 * 
 * @category Model-Signin-Configuration
 * @package  Procedural_Signin_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/login-page/model_signin.php
 */
//*=========================================================================*//
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    //*----------------------------------------------------------------------*//
    $email =     trim($_POST["email"]);
    $pass_word = trim($_POST["password"]);
    //*----------------------------------------------------------------------*//
    var_dump($email);
    var_dump($pass_word);
    try {
        // START SESSION TO CATCH ANY REGISTRATION ERRORS //
        include_once "../../includes/session_inc.php";
        // INCLUDE THE DATBASE CONNECTION //
        include_once "../../includes/database.procedural.inc.php";
    } catch (PDOException $e) {
        die("Connected Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../login-page/model-login.php");
    die();
}