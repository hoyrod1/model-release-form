<?php
/**
 * * @file
 * php version 8.2
 * Email Model Release Form file
 * 
 * @category Email_Model_Release_Form
 * @package  Email_Model_Release_Form_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/generateModelReleaseToPDF/emailModelReleaseForm.php
 */
declare(strict_types=1);
//============================================================================================================//
  try 
  {
      // START SESSION TO CATCH ANY REGISTRATION ERRORS AND SUCCESES //
      include_once "../../includes/session_inc.php";
      // INCLUDE THE DATBASE CONNECTION //
      include_once "../../includes/database.procedural.inc.php";
      // INCLUDE THE EMAIL MODEL RELEASE MODEL THAT INTERACTS WITH THE DATABASE //
      include_once "../model/email_model_release_model.php";
      // INCLUDE THE EMAIL MODEL RELEASE CONTROLLER THAT CHECKS IF THE MODEL RELEASE EXIST //
      include_once "../controller/email_model_release_controller.php";
      // INCLUDE THE send_email.php FILE TO SEND EMAIL TO USER //
      include_once "../../send_user_pdf_email.php";
      // INCLUDE THE sanitize_function.php FILE TO CLEAN DATA USED FOR DATABASE QUERY//
      include "../../includes/sanitize_function.php";
      //*----------------------------------------------------------------------*//
      // -----------------------------------------------------------------------------------------------------------//

      //------------------------------------------------------------------------------------------------------------//
      // THE MODELS EMAIL ADDRESS CACHED DURING THE LOGIN PROCESS IS USED TO SEND EMAIL WITH THE MODEL RELEASE FORM //
      $model_email = testInput($_SESSION["users_email"]);
      //============================================================================================================//
      // CHECK IF THE CURRENT MODEL RELEASE FORM EXIST USING THE MODELS EMAIL
      if (Does_Email_Exist_controller($pdo, $model_email)) {
          $_SESSION["update_model_release_error"] = "There was a problem verifying if you \"Model Release\" exist";
          header("Location: ../index.php");
          die();
      }
      //------------------------------------------------------------------------------------------------------------//
      // START THE PROCCESS OF RETRIEVING THE MODEL RELEASE FORM DATA FROM THE DATABASE
      $results = Get_Model_Release_By_Email_model($pdo, $model_email);
      
      if ($results) {
        $email      = $results["email"];
        $legal_name = $results["legal_name"];
        SendUserPdfemail($email, $legal_name);
        $_SESSION["update_model_release_success"] = "Your model release has been emailed";
        header("Location: ../index.php");
        $pdo = null;
        $stmt = null;
        die();       
      } else {
          $_SESSION["update_model_release_error"] = "Your model release form: {$e->getMessage()}";
          header("Location: ../index.php");
          die();       
      }
  }
  catch(PDOException $e) 
  {
      die("Connected Failed: " . $e->getMessage());
  }
