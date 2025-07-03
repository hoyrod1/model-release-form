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
    if (isset($_SESSION['reset_password_error'])) {
        $error = $_SESSION['reset_password_error'];
        
        $error_message = "<div style=\"text-decoration:underline;width:735px;margin:auto;color:red;\" align=\"center\">";
        $error_message .= $error;
        $error_message .= "</div>";
        echo $error_message;

        unset($_SESSION['reset_password_error']);
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
    if (isset($_SESSION["reset_password_success"])) {
        $success_messages = $_SESSION["reset_password_success"];

        $message = "<p style=\"width: 735px;margin: auto;color:rgb(10, 245, 61);\" align=\"center\">";
        $message .= $success_messages;
        $sessage .= "</p>";
        echo $message;
    }
    unset($_SESSION["reset_password_success"]);
}
//============================================================================//