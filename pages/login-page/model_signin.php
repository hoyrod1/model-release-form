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
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_Email = filter_var($email, FILTER_SANITIZE_STRING);
    $filtered_Password = filter_var($pass_word, FILTER_SANITIZE_STRING);
    //----------------------------------------------------------------------//

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
        if (Is_Input_empty($filtered_Email, $filtered_Password)) {
            $errors["empty_input"] = "Fill in all fields";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF EMAIL IS VALID
        if (Is_Email_valid($filtered_Email)) {
            $errors["invalid_email"] = "Invalid email format";
        }
        //------------------------------------------------------------------------------------------------//
        // CHECK IF PASSWORD IS VALID
        if (Is_Password_valid($filtered_Password)) {
            $errors["invalid_password"] = "Your password must contain 6-24 characters, at least one number and one letter and no spaces";
        }
        //------------------------------------------------------------------------------------------------//

        //------------------------------------------------------------------------------------------------//
        // CHECK IF EMAIL ALREADY EXIST
        var_dump(Does_Email_Exist_controller($pdo, $filtered_Email));
        if (Does_Email_Exist_controller($pdo, $filtered_Email)) {
            $errors["email_does_not_exist"] = "There is no user with this email";
        }
        //------------------------------------------------------------------------------------------------//
        //************************************************************************************************//
        //------------------------------------------------------------------------------------------------//
        // CHECK IF THERE ARE ANY ERRORS 
        if ($errors) {
            $_SESSION["login_error"] = $errors;
            header("Location: ../login-page/model-login.php");
            die("Query Failed: " . $e->getMessage());
        }
        //------------------------------------------------------------------------------------------------//

        //------------------------------------------------------------------------------------------------//
        //************************************************************************************************//
        //------------------------------------------------------------------------------------------------//

        //------------------------------------------------------------------------------------------------//
        //********************** THIS CONTAINS THE RESULTS FROM THE DATABASE QUERY ***********************//
        $results = Get_User_model($pdo, $filtered_Email);
        //------------------------------------------------------------------------------------------------//
        
        //------------------------------------------------------------------------------------------------//
        // CHECK IF PASSWORD ENTERED IS CORRECT
        if (Is_Password_correct($filtered_Password, $results["pass_word"])) {
            $errors["invalid_password"] = "Password is not correct";
            $_SESSION['login_error'] = $errors;
            header("Location: ../login-page/model-login.php");
            die("Query Failed: " . $e->getMessage());
        }
        //------------------------------------------------------------------------------------------------//
        // SET THE SESSION ID WITH THE USERS (ID)
        $mewUserSessionId = session_create_id();
        $userSessionId = $mewUserSessionId ."_". $results["id"];
        session_id($userSessionId);
        //------------------------------------------------------------------------------------------------//
        // SET THE SESSION VARIABLES FOR THE USERS INFO
        $_SESSION["users_id"]         = $results["id"];
        $userFullName = $results["firstname"] . " " .$results["lastname"];
        // USING htmlspecialchars() to display USERS INFO IN THE MODEL RELEASE FORM
        $_SESSION["users_name"]       = htmlspecialchars($userFullName);
        $_SESSION["users_model_name"] = htmlspecialchars($results["model_name"]);
        $_SESSION["users_email"]      = htmlspecialchars($results["email"]);
        $_SESSION["users_number"]     = htmlspecialchars($results["contact_number"]);
        //------------------------------------------------------------------------------------------------//
        // RESETTING "$_SESSION["regeneration_set"]" SESSION VARIABLE TO CURRENT TIME
        $_SESSION["regeneration_set"] = time();
        //------------------------------------------------------------------------------------------------//
        // AFTER LOGGING IN SET SUCCESS MESSAGE AND REDIRECT TO MODEL RELEASE FORM
        $welcomeMessage = "Hello " .$userFullName. " please fill out the form";;
        $_SESSION["login_success"] = $welcomeMessage;
        header("Location: ../../model-form/index.php");
        // RESSET THE CONNECTION TO NULL AND KILL THE SCRIPT
        $pdo = null;
        $stmt = null;
        die();
        //------------------------------------------------------------------------------------------------//
    } catch (PDOException $e) {
        die("Connected Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../login-page/model-login.php");
    die();
}