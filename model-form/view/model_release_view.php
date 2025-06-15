<?php
/**
 * * @file
 * php version 8.2
 * Model Relase Form View Configuration file
 * 
 * @category Model_Relase_Form_View
 * @package  Model_Relase_Form_View_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/view/model_release_view.php
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
function modelReleaseFormErrorMessage()
{
    if (isset($_SESSION['model_release_error'])) {
        $errors = $_SESSION['model_release_error'];
        echo "<br>";
        foreach ($errors as $error) {
            $error_message = "<div style=\"width: 335px;margin: auto; padding: 10px; background-color:red; color:white;\" align=\"center\" class=\"alert\">";
            $error_message .= $error;
            $error_message .= "</div>";
            echo $error_message;
        }

        unset($_SESSION['model_release_error']);
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
function modelReleaseFormSuccessMessage()
{
    if (isset($_SESSION["model_release_success"])) {
        $success_messages = $_SESSION["model_release_success"];

        $message = "<p style=\"width: 335px;margin: auto; background-color:green; color:white;\" align=\"center\">";
        $message .= $success_messages;
        $sessage .= "</p>";
        echo $message;
    }
    unset($_SESSION["model_release_success"]);
}
//============================================================================//
