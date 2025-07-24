<?php
/**
 * * @file
 * php version 8.2
 * Update Model Release Form Processor Configuration file
 * 
 * @category Update_Model_Release_Form_Processor
 * @package  Update_Model_Release_Form_Processor_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/update_model_release_form/update_model_release_form_processor.php
 */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
  //*----------------------------------------------------------------------*//
  include "../../includes/sanitize_function.php";
  //*----------------------------------------------------------------------*//
  $id =                testInput($_POST["modelReleaseId"]);
  $producer_name =     testInput($_POST["producer-name"]);
  $model_name =        testInput($_POST["model-name"]);
  $email =             testInput($_POST["email"]);
  $date_of_shoot =     testInput($_POST["date-of-shoot"]);
  $location_of_shoot = testInput($_POST["location-of-shoot"]);
  $payment_amount =    testInput($_POST["payment-amount"]);
  $legal_name =        testInput($_POST["legal-name"]);
  $social_security =   testInput($_POST["social-security"]);
  $contact_number =    testInput($_POST["contact_number"]);
  $address =           testInput($_POST["address"]);
  $city =              testInput($_POST["city"]);
  $state =             testInput($_POST["state"]);
  $zip_code =          testInput($_POST["zip-code"]);
  $country =           testInput($_POST["country"]);
  //*----------------------------------------------------------------------*//

  //*----------------------------------------------------------------------*//
  try 
  {
      // START SESSION TO CATCH ANY REGISTRATION ERRORS AND SUCCESES //
      include_once "../../includes/session_inc.php";
      // INCLUDE THE DATBASE CONNECTION //
      include_once "../../includes/database.procedural.inc.php";
      // INCLUDE THE REGISTRATION MODEL THAT INTERACTS WITH THE DATABSE //
      include_once "../model/update_model_release_model.php";
      // INCLUDE THE REGISTRATION CONTROLLER THAT HANDLES USER INPUT //
      include_once "../controller/update_model_release_controller.php";
      // INCLUDE THE generateModelReleaseToPDF TO GENERATE A PDF FILE //
      include_once "../generateModelReleaseToPDF/generateUpdatedModelReleaseForm.php";
      // INCLUDE THE send_email.php FILE TO SEND EMAIL TO USER //
      include_once "../generateModelReleaseToPDF/emailUpdatedModelReleaseForm.php";

      // CHECK IF ALL INPUT FEILDS ARE NOT EMPTY
      if (Is_Update_Input_empty(
        $producer_name, // done
        $model_name, // done
        $email, // done
        $date_of_shoot, // done
        $location_of_shoot, 
        $payment_amount, 
        $legal_name, // done
        $social_security, // done 
        $contact_number, // done 
        $address, 
        $city, 
        $state, 
        $zip_code,
        $country
    )
      ) {
            $_SESSION["update_model_release_error"] = "Fill in all fields";
            header("Location: update_model_release_form.php");
            die();
      }
      //------------------------------------------------------------------------------------------------//
      // CHECKS IF THE PRODUCERS NAME CONTAIN VALID DATA
      if (Is_Update_Producer_Name_valid($producer_name)) {
          $_SESSION["update_model_release_error"] = "Please use letters, hyphens and periods in the producers name";
          header("Location: update_model_release_form.php");
          die();
      }
      //------------------------------------------------------------------------------------------------//
      // CHECKS IF THE MODELS STAGE NAME CONTAIN VALID DATA
      if (Is_Update_Model_Name_valid($model_name)) {
          $_SESSION["update_model_release_error"] = "Please use letters, hyphens and periods in the model name";
          header("Location: update_model_release_form.php");
          die();
      }
      //------------------------------------------------------------------------------------------------//
      // CHECKS IF THE MODELS STAGE NAME CONTAIN VALID DATA
      if (Is_Update_Legal_Name_valid($legal_name)) {
          $_SESSION["update_model_release_error"] = "Please use letters, hyphens and periods in the legal name";
          header("Location: update_model_release_form.php");
          die();
      }
      // ------------------------------------------------------------------------------------------------//
      // CHECK IF EMAIL IS VALID 
      if (Is_Update_Email_valid($email)) {
          $_SESSION["update_model_release_error"] = "Invalid email format";
          header("Location: update_model_release_form.php");
          die();
      }
      // ------------------------------------------------------------------------------------------------//
      // CHECK IF CONTACT NUMBER IS VALID
      if (Is_Update_SocialSecurity_valid($social_security)) {
          $_SESSION["update_model_release_error"] = "Please only use hyphens between your social security numbers (xxx-xx-xxxx)";
      }
      //------------------------------------------------------------------------------------------------//
      // CHECK IF CONTACT NUMBER IS VALID
      if (Is_Update_Payment_amount($payment_amount)) {
          $_SESSION["update_model_release_error"] = "Please only enter number, commas and periods";
      }
      //------------------------------------------------------------------------------------------------//

      //------------------------------------------------------------------------------------------------//
      // START THE PROCCESS OF SAVING THE MODEL RELEASE FORM INTO THE DATABASE
      $results = Update_ModelRelease_Form_model(
        $pdo, 
        $id, 
        $producer_name, 
        $model_name, 
        $email, 
        $date_of_shoot, 
        $location_of_shoot, 
        $payment_amount, 
        $legal_name, 
        $social_security, 
        $contact_number, 
        $address, 
        $city, 
        $state, 
        $zip_code,
        $country
    );

      if ($results) {
        generateUpdatedModelReleaseToPDF(
            $producer_name, 
            $model_name, 
            $email, 
            $date_of_shoot, 
            $location_of_shoot, 
            $payment_amount, 
            $legal_name, 
            $social_security, 
            $contact_number, 
            $address, 
            $city, 
            $state, 
            $zip_code,
            $country
            );
        EmailUpdatedModelReleaseForm($email, $legal_name);
        $_SESSION["update_model_release_success"] = "Your model release has been updated and emailed";
        header("Location: ../index.php");
        $pdo = null;
        $stmt = null;
        die();       
      } else {
          $_SESSION["update_model_release_error"] = "Your model release has not been updated: {$e->getMessage()}";
          header("Location: update_model_release_form.php");
      }
  }
  catch(PDOException $e) 
  {
      die("Connected Failed: " . $e->getMessage());
  }
  //*----------------------------------------------------------------------*//
} else {
  header("Location: ../index.php");
  die();
}