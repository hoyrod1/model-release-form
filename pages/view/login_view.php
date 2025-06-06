<?php
/**
 * * @file
 * php version 8.2
 * Procedural login view Configuration file for Model Release Form
 * 
 * @category Login_View
 * @package  Procedural_Login_View_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/view/Login_view.php
 */
declare(strict_types=1);
//*=========================================================================*//

//========================================================================//
/**
 * This function returns a session error message
 * 
 * @access public  
 * 
 * @return mixed
 */
function errorMessage()
{
    if (isset($_SESSION['login_error'])) {
        $errors = $_SESSION['login_error'];
        echo "<br>";
        foreach ($errors as $error) {
            $error_message = "<div style=\"width: 335px;margin: 30px auto; background-color:red; color:white;\" align=\"center\" class=\"alert\">";
            $error_message .= $error;
            $error_message .= "</div>";
            echo $error_message;
        }

        unset($_SESSION['login_error']);
    }
}
//========================================================================//

//========================================================================//
/**
 * This function returns a session success message
 * 
 * @access public  
 * 
 * @return mixed
 */
function successMessage()
{
    if (isset($_SESSION["login_success"])) {
        $success_messages = $_SESSION["login_success"];

        $message = "<p style=\"width: 335px;margin: 30px auto; background-color:green; color:white;\" align=\"center\">";
        $message .= $success_messages;
        $sessage .= "</p>";
        echo $message;
    }
    unset($_SESSION["login_success"]);
}
//=====================================================================//