<?php
/**
 * * @file
 * php version 8.2
 * Generate Model Release To PDF Configuration file
 * 
 * @category Generate_Model_Release_To_PDF
 * @package  Generate_Model_Release__To_PDF_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/generateModelReleaseToPDF/generateModelReleaseToPDF.php
 */
declare(strict_types=1);
//*=====================================================================================================*//
//-------------------------------------------------------------------------------------------------------//
// START SESSION TO CATCH ANY REGISTRATION ERRORS AND SUCCESES //
require_once "../../includes/session_inc.php";
// INCLUDE THE send_email.php FILE TO SEND EMAIL TO USER //
require_once "../../send_user_pdf_email.php";
//-------------------------------------------------------------------------------------------------------//

//------------------------------------------------------------------------------------------------//
try {
  // INCLUDE THE DATBASE CONNECTION //
  include_once "../../includes/database.procedural.inc.php";
  // INCLUDE THE REGISTRATION MODEL THAT INTERACTS WITH THE DATABSE //
  include_once "../model/model_release_model.php";
  //------------------------------------------------------------------------------------------------//
  // THE EMAIL ADDRESS STORED DURING THE LOGIN PROCESS IS USED TO RETRIEVED THE MODEL RELEASE FORM  //
  $model_email = $_SESSION["users_email"];
  //------------------------------------------------------------------------------------------------//

  //------------------------------------------------------------------------------------------------//
  //********************** THIS CONTAINS THE RESULTS FROM THE DATABASE QUERY ***********************//
  $results = Get_ModelRelease_Form_model($pdo, $model_email);
  //------------------------------------------------------------------------------------------------//
  if ($results) {
    $producer_name     = $results["producer_name"];
    $model_name        = $results["model_name"];
    $email             = $results["email"];
    $date_of_shoot     = $results["date_of_shoot"];
    $location_of_shoot = $results["location_of_shoot"];
    $compensation      = $results["compensation"];
    $legal_name        = $results["legal_name"];
    $social_security   = $results["social_security"];
    $address           = $results["address"];
    $city              = $results["city"];
    $state             = $results["state"];
    $zip_code          = $results["zip_code"];
    $country           = $results["country"];
} else {
    die("Query Failed: " . $e->getMessage());
  }
  //------------------------------------------------------------------------------------------------//
} catch(PDOException $e) 
{
    die("Connected Failed: " . $e->getMessage());
}
//---------------------------------------------------------------------------------------------------//

//*==============================================================================*//
/**
 * The generateModelReleaseToPDF generates a PDF file from the model release form
 * 
 * @param string $producer_name     This param has the producers name
 * @param string $model_name        This param has the models name
 * @param string $email             This param has the models name
 * @param string $date_of_shoot     This param has the date of the shoot
 * @param string $location_of_shoot This param has the location of the shoot
 * @param string $compensation      This param has the models pay rate
 * @param string $legal_name        This param has the models legal name
 * @param string $social_security   This param has the models social security #
 * @param string $address           This param has the models street address
 * @param string $city              This param has the city the model lives in
 * @param string $state             This param has the state the model lives in
 * @param string $zip_code          This param has the zip code the model lives in
 * @param string $country           This param has the zip code the model lives in
 * 
 * @access public  
 * 
 * @return mixed
 */
//*==============================================================================*//
require "../../vendor/autoload.php";
use Dompdf\Dompdf;
//*==============================================================================*//

//*==============================================================================*//
function generateModelReleaseToPDF(
  string $producer_name, 
  string $model_name, 
  string $email, 
  string $date_of_shoot, 
  string $location_of_shoot, 
  string $compensation, 
  string $legal_name, 
  string $social_security, 
  string $address, 
  string $city, 
  string $state, 
  string $zip_code,
  string $country
) {
  $html = '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STC Media Model Release Form</title>
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: rgb(255, 255, 255);
    }
    
    .container {
      margin: 20px auto;
      width: 70%;
      height: 100%;
    }
    
    h2,
    h3 {
      text-align: center;
      margin: 5px 0 5px 0;
    }
    
    h2 {
      text-decoration: underline;
    }
    
    .producer-name,
    .model-name,
    .date-of-shoot,
    .email,
    .location-of-shoot {
      font-size: 25px;
      font-weight: 700;
    }
    
    #producer-name,
    #model-name,
    #date-of-shoot,
    #email,
    #location-of-shoot,
    #legal-name,
    #social-security,
    #address,
    #city,
    #state,
    #zip,
    #country {
      padding: 5px 0 0 5px;
      margin: 10px 0 0 0;
      font-size: large;
    }

    .summary-title,
    .print-info {
      text-align: left;
    }
    
    .contract-summary {
      margin: 10px 0 10px 0;
    }

    .payment-amount {
      font-size: 16px;
      font-weight: bolder;
    }

    #payment-amount {
      margin: 10px 0 0 0;
    }

    .tax-disclaimer {
      margin: 5px 0 15px 0;
      text-decoration: underline;
      font-size: 18px;
    }
    
    .legal-name,
    .social-security,
    .address,
    .city,
    .state,
    .zip,
    .country {
      font-size: 20px;
      font-weight: 600;
    }
    
    .submit-button {
      display: block;
      margin: 30px auto;
      font-size: large;
      font-weight: bold;
      color: aliceblue;
      width: 100%;
      padding: 10px;
      background-color: rgb(97, 98, 101);
      border: none;
      border-radius: 5px;
      transition: all 1s linear;
    }
    
    .submit-button:hover {
      background-color: white;
      color: rgb(97, 98, 101);
      box-shadow: 1px 1px 10px 3px rgb(97, 98, 101);
    }
    
    input[type=text] {
      border: none;
      border-bottom: 2px solid black;
    }
    
    </style>
  </head>
  <body>
    <div class="container">
      <h2 class="dba">Exotic Hard Body Production</h2>
      <h3 class="corp-name">A division of S.T.C. Media Inc</h3>
      <h2 class="form-name">Model Release Form</h2>
      <!----------------------------------------------------------------------------->
        <p class="contract-summary">
          This Model Release Form ("Agreement") is made and entered 
          into as of the date set forth below by and between:
        </p>
        <label class="producer-name" for="producer-name">
          Producer Name:
        </label>
        <input 
          type="text" 
          name="producer-name" 
          id="producer-name"
          value="'.$producer_name.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="model-name" for="model-name">
          Model Name:
        </label>
        <input 
          type="text" 
          name="model-name" 
          id="model-name"
          value="'.$model_name.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="date-of-shoot" for="date-of-shoot">
          email:
        </label>
        <input 
          type="text" 
          name="email" 
          id="email"
          value="'.$email.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="date-of-shoot" for="date-of-shoot">
          Date of Shoot:
        </label>
        <input 
          type="text" 
          name="date-of-shoot" 
          id="date-of-shoot"
          value="'.$date_of_shoot.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="location-of-shoot" for="location-of-shoot">
          Location of Shoot:
        </label>
        <input 
          type="text" 
          name="location-of-shoot" 
          id="location-of-shoot"
          value="'.$location_of_shoot.'"
          >
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <h3 class="summary-title">
          <span class="summary-number">
            1.
          </span> 
          Grant of Rights
        </h3>
        <p class="contract-summary">
        The Model hereby grants the Producer/Photographer/Videographer 
        and their assigns, licensees, and legal representatives the irrevocable, 
        perpetual, and worldwide right to use their name,
         likeness, image, voice, and appearance as 
         captured in photographs and/or video recordings
          for commercial, promotional, editorial, 
          or artistic purposes in any medium, 
          including but not limited to print, 
          digital, television, streaming services, 
          and social media platforms. This release includes adult-themed
        </p>
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <h3 class="summary-title">
          <span class="summary-number">
            2.
          </span> 
          Compensation
        </h3>
        <p class="contract-summary">
        The Model acknowledges and agrees that they are voluntarily 
        participating and that the compensation, if any, has been 
        agreed upon separately. The Model waives any right to future 
        royalties or compensation from the use of the images and recordings.
        </p>
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <h3 class="summary-title">
          <span class="summary-number">
            3.
          </span> 
          Age Verification
        </h3>
        <p class="contract-summary">
        The Model affirms that they are at least 18 years of age and legally 
        eligible to participate in the production of adult content. The Model 
        agrees to provide valid government-issued photo identification for age 
        verification purposes in compliance with 18 U.S.C. § 2257 record-keeping 
        requirements.
        </p>
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <h3 class="summary-title">
          <span class="summary-number">
            4.
          </span> 
          Consent to Perform
        </h3>
        <p class="contract-summary">
        The Model affirms that they are voluntarily participating in this production 
        and that they are not under the influence of drugs or alcohol. They further 
        acknowledge that they have not been coerced, threatened, or forced into 
        participating.
        </p>
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <h3 class="summary-title">
          <span class="summary-number">
            5.
          </span> 
          Usage and Editing
        </h3>
        <p class="contract-summary">
        The Producer/Photographer/Videographer has full discretion regarding the 
        editing, cropping, and modification of the images and recordings. The Model 
        waives any right to inspect or approve the final product or its usage.
        </p>
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <h3 class="summary-title">
          <span class="summary-number">
            6.
          </span> 
          Release and Waiver
        </h3>
        <p class="contract-summary">
        The Model irrevocably releases, discharges, and holds harmless the 
        Producer/Photographer/Videographer and their assigns, licensees, legal 
        representatives, and any third parties publishing and/or distributing 
        the images and recordings from any claims, demands, or liabilities 
        related to the use of their likeness, including but not limited to claims 
        for defamation, right of publicity, or invasion of privacy.
        </p>
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <h3 class="summary-title">
          <span class="summary-number">
            7.
          </span> 
          Indemnification
        </h3>
        <p class="contract-summary">
        The Model agrees to indemnify and hold harmless the 
        Producer/Photographer/Videographer from
        </p>
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <h3 class="summary-title">
          <span class="summary-number">
            8.
          </span> 
          Confidentiality
        </h3>
        <p class="contract-summary">
        The Model acknowledges that details regarding the production, including 
        but not limited to payment, content, and distribution channels, may be 
        confidential. They agree not to disclose such information without prior 
        written consent from the Producer.
        </p>
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <h3 class="summary-title">
          <span class="summary-number">
            9.
          </span> 
          Governing Law and Jurisdiction
        </h3>
        <p class="contract-summary">
        This Agreement shall be governed by and construed in accordance with the 
        laws of the state or country in which the Producer/Photographer/Videographer 
        is based. Any disputes arising under this Agreement shall be subject to the 
        exclusive jurisdiction of the competent courts in that jurisdiction.
        </p>
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <label class="payment-amount" for="payment-amount">
          The model will receive a compensation in the amount of $
        </label>
        <input 
          type="text" 
          name="payment-amount" 
          id="payment-amount"
          size="5"
          value="'.$compensation.'"
          >
        <!--------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------->
        <p class="contract-summary tax-disclaimer">
        Rodney St. Cloud does not withhold any taxes
        </p>
        <!--------------------------------------------------------------------------->
        <!--=======================================================================-->
        <!--------------------------------------------------------------------------->
        <h2 class="print-info">Please enter your information</h2>
        <!--------------------------------------------------------------------------->
        <label class="legal-name" for="legal-name">
          Legal Name:
        </label>
        <input 
          type="text" 
          name="legal-name" 
          id="legal-name" 
          value="'.$legal_name.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="social-security" for="social-security">
          Social Security:
        </label>
        <input 
          type="text" 
          name="social-security" 
          id="social-security"
          value="'.$social_security.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="address" for="address">
          Address:
        </label>
        <input 
          type="text" 
          name="address" 
          id="address"
          value="'.$address.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="city" for="city">
          City:
        </label>
        <input 
          type="text" 
          name="city" 
          id="city"
          value="'.$city.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="state" for="state">
          State:
        </label>
        <input 
          type="text" 
          name="state" 
          id="state"
          value="'.$state.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="zip" for="zip">
          Zip:
        </label>
        <input 
          type="text" 
          name="zip-code" 
          id="zip"
          value="'.$zip_code.'"
          >
        <!--------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------------------------------------->
        <label class="country" for="country">
          Country:
        </label>
        <input 
          type="text" 
          name="country" 
          id="country"
          value="'.$country.'"
          >
        <!--------------------------------------------------------------------------->
    </div>
  </body>
  </html>
  ';
  $dompdf = new Dompdf;
  $dompdf->loadHtml($html);
  $dompdf->render();
  $dompdf->addInfo("Title", "Model Release Form");
  $dompdf->addInfo("Author", "Rodney St. Cloud");
  $dompdf->addInfo("Subject", "The models legal aggrement");
  $dompdf->addInfo("Keywords", "Model Release Form");
  $dompdf->addInfo("Creator", "Rodney St. Cloud");
  $dompdf->stream("STCmedia-inc-Model-Relase-Form.pdf", ["Attachment" => 0]);
  $output = $dompdf->output();
  $pdfFileName = "$legal_name-Model-Release-Form.pdf";
  file_put_contents($pdfFileName, $output);
}
//*==============================================================================*//
generateModelReleaseToPDF(
  $producer_name, 
  $model_name, 
  $email, 
  $date_of_shoot, 
  $location_of_shoot, 
  $compensation, 
  $legal_name, 
  $social_security, 
  $address, 
  $city, 
  $state, 
  $zip_code,
  $country
);
SendUserPdfemail($email, $legal_name);