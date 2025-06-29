<?php
/**
 * * @file
 * php version 8.2
 * Password Recover View file for Model Release Form
 * 
 * @category Password_Recover_View
 * @package  Password_Recover_View_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/view/recover_view.php
 */
declare(strict_types=1);
//*=========================================================================*//

//===========================================================================//
/**
 * This function returns a session error message
 * 
 * @access public  
 * 
 * @return mixed
 */
function errorMessage()
{
    if (isset($_SESSION['recover_error'])) {
        $errors = $_SESSION['recover_error'];
        echo "<br>";
        foreach ($errors as $error) {
            $error_message = "<div style=\"width: 335px;margin: auto;padding: 10px;background-color: red; color: white;\" align=\"center\" class=\"alert\">";
            $error_message .= $error;
            $error_message .= "</div>";
            echo $error_message;
        }

        unset($_SESSION['recover_error']);
    }
}
//===========================================================================//

//===========================================================================//
/**
 * This function returns a session success message
 * 
 * @access public  
 * 
 * @return mixed
 */
function successMessage()
{
    if (isset($_SESSION["recover_success"])) {
        $success_messages = $_SESSION["recover_success"];

        $message = "<p style=\"width: 335px;margin: auto;padding: 10px;background-color: green;color:white;\" align=\"center\">";
        $message .= $success_messages;
        $sessage .= "</p>";
        echo $message;
    }
    unset($_SESSION["recover_success"]);
}
//============================================================================//