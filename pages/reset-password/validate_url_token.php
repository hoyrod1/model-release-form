<?php
/**
 * * @file
 * php version 8.2
 * Validate Url Token For Model Release Form
 * 
 * @category Validate_Url_Token
 * @package  Validate_Url_Token_Configuration_Page
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/reset-password/validate_url_token.php
 */
//
//*==============================================================================*//
/**
 * The Is_User_Token_Valid_model function if the token in URL is valid 
 * 
 * @param string $token This param has the token from the URL
 * 
 * @access public  
 * 
 */
function Validate_Url_token(string $token)
{
  //*---------------------------------------------------------------------------------*//
  include "../../includes/sanitize_function.php";
  //*---------------------------------------------------------------------------------*//
  $url_token = testInput($token);
  //*---------------------------------------------------------------------------------*//
  try {
    // INCLUDE THE DATBASE CONNECTION //
    include_once "../../includes/database.procedural.inc.php";
    // INCLUDE THE LOGIN MODEL THAT INTERACTS WITH THE DATABSE //
    include_once "../model/validate_token_model.php";
    // INCLUDE THE LOGIN CONTROLLER THAT HANDLES USER INPUT //
    include_once "../controller/validate_token_controller.php";
    //---------------------------------------------------------------------------------//
    // CHECK IF EMAIL IS VALID
    if (!Is_User_Token_Valid_model($pdo, $url_token)) {
        $_SESSION['reset_password_error'] = "Invalid token";
        header("Location: reset-password.php");
    }
    //---------------------------------------------------------------------------------//
  } catch (PDOException $e) {
      $_SESSION['reset_password_error'] = "There was an error retrieving your data";
      header("Location: reset-password.php");
      die();
  }
}
//*==============================================================================*//