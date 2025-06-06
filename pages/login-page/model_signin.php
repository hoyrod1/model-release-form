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

    try {
        // START SESSION TO CATCH ANY LOGIN ERRORS //
        include_once "../../includes/session_inc.php";
        // INCLUDE THE DATBASE CONNECTION //
        include_once "../../includes/database.procedural.inc.php";
        // INCLUDE THE LOGIN MODEL THAT INTERACTS WITH THE DATABSE //
        include_once "../model/login_model.php";
        // INCLUDE THE LOGIN CONTROLLER THAT HANDLES USER INPUT //
        include_once "../controller/login_controller.php";
        //------------------------------------------------------------------------------------------------//
        // ERROR HANDLERS ARRAY //
        $errors = [];
        // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY
        if (Is_Input_empty($email, $pass_word)) {
            $errors["empty_input"] = "Fill in all fields";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF EMAIL IS VALID
        if (Is_Email_valid($email)) {
            $errors["invalid_email"] = "Invalid email format";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF PASSWORD IS VALID
        if (Is_Password_valid($pass_word)) {
            $errors["invalid_password"] = "Your password must contain 6-24 characters, at least one number and one letter and no spaces";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF THERE ARE ANY ERRORS 
        if ($errors) {
            $_SESSION["login_error"] = $errors;
            header("Location: ../login-page/model-login.php");
            die("Query Failed: " . $e->getMessage());
        } else {
            // IF THERE ARE NO ERRORS CHECK IF EMAIL EXIST IN THE DATABASE 
            $test_login =  Get_User_Email_controller($pdo, $email);
            if ($test_login) {
                //var_dump($test_login);
                $_SESSION["login_success"] = "Please fill out the form";
                header("Location: ../../model-form/index.php");
                $pdo = null;
                $stmt = null;
                die();    
            } else {
                //var_dump($test_login);
                $_SESSION["login_error"] = "The email entered wasn't found";
                header("Location: ../login-page/model-login.php");
                die("Login Failed: " . $e->getMessage());
            }
        }
        //------------------------------------------------------------------------------------------------//
    } catch (PDOException $e) {
        die("Connected Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../login-page/model-login.php");
    die();
}