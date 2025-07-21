<?php
/**
 * * @file
 * php version 8.2
 * Model Release Form View Configuration file
 * 
 * @category Model_Release_Form_View
 * @package  Model_Release_Form_View_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/view/update_model_release_view.php
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
function updateModelReleaseFormErrorMessage()
{
    if (isset($_SESSION['update_model_release_error'])) {
      $success_messages = $_SESSION["update_model_release_error"];

      $message = "<p style=\"width: 735px;margin: auto;padding: 10px; background-color: red;color: white;\" align=\"center\">";
      $message .= $success_messages;
      $sessage .= "</p>";
      echo $message;

    }
    unset($_SESSION['update_model_release_error']);
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
function updateModelReleaseFormSuccessMessage()
{
    if (isset($_SESSION["update_model_release_success"])) {
        $success_messages = $_SESSION["update_model_release_success"];

        $message = "<p style=\"width: 735px;margin: auto;padding: 10px; background-color: green;color: white;\" align=\"center\">";
        $message .= $success_messages;
        $sessage .= "</p>";
        echo $message;
    }
    unset($_SESSION["update_model_release_success"]);
}
//============================================================================//