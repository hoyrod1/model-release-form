<?php
/**
 * * @file
 * php version 8.2
 * Model Release Form Configuration file
 * 
 * @category Model_Release_Form
 * @package  Model_Release_Form_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/model_release_form/model_release_form.php
 */
require_once "../../includes/session_inc.php";
if (!isset($_SESSION["users_name"])) {
    $userMessage = ' Please log in';
    $_SESSION["login_error"] = $userMessage;
    header("Location: ../../pages/login-page/model-login.php");
}
require_once "../../pages/view/login_view.php";
require_once "../view/model_release_view.php";
$producer = "Rodney St. Cloud";
$current_date = date("m-d-Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STC Media Model Release Form</title>
  <link rel="stylesheet" href="../style/model_release_form.css">
</head>
<body>
  <nav class="nav">
    <ul class="nav-ul-link">
      </li class="profil-nav-link">
        <a href="../index.php" class="profile-a-link">
        Click here to return to your profile
        <?php echo $_SESSION["users_model_name"]; ?>
        </a>
      </li>
      <li class="nav-link">
        <a href="../includes/logout.php">
            Log Out
        </a>
      </li>
    </ul>
  </nav>
  <?php
      successMessage();
      modelReleaseFormErrorMessage();
      modelReleaseFormSuccessMessage();
    ?>
  <div class="container">
    <h2 class="dba">Exotic Hard Body Production</h2>
    <h3 class="corp-name">A division of S.T.C. Media Inc</h3>
    <h2 class="form-name">Model Release Form</h2>
    <!----------------------------------------------------------------------------->
    <!---------------------- THE BEGINNING OF THE FORM FIELD ---------------------->
    <!----------------------------------------------------------------------------->
    <form class="model-form" action="model_release_form_processor.php" method="post">
    <!----------------------------------------------------------------------------->
      <p class="contract-summary">
        This Model Release Form ("Agreement") is made and entered 
        into as of the date set forth below by and between:
      </p>
      <label class="producer-name" for="producer-name">
        Producer's Name:
      </label>
      <input 
        type="text" 
        name="producer-name" 
        id="producer-name"
        value="<?php echo $producer; ?>"
        >
      <!--------------------------------------------------------------------------->
      <br>
      <!--------------------------------------------------------------------------->
      <label class="model-name" for="model-name">
        Model's Name:
      </label>
      <input 
        type="text" 
        name="model-name" 
        id="model-name"
        value="<?php echo $_SESSION["users_model_name"]; ?>"
        >
      <!--------------------------------------------------------------------------->
      <br>
      <!--------------------------------------------------------------------------->
      <label class="date-of-shoot" for="date-of-shoot">
        email:
      </label>
      <input 
        type="email" 
        name="email" 
        id="email"
        value="<?php echo $_SESSION["users_email"]; ?>"
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
        value="<?php echo $current_date; ?>"
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
        require
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
        placeholder="(If this is only a content exchange shoot please enter 0.00)"
        require
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
        value="<?php echo $_SESSION["users_name"]; ?>"
        require
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
        require
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
        require
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
        require
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
        require
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
        require
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
        require
        >
      <!--------------------------------------------------------------------------->
      <br>
      <!--------------------------------------------------------------------------->
      <button class="submit-button" name="submit" type="submit">Submit Form</button>
      <!--------------------------------------------------------------------------->
    </form>
    <!----------------------------------------------------------------------------->
    <!------------------------- THE END OF THE FORM FIELD ------------------------->
    <!----------------------------------------------------------------------------->
  </div>
</body>
</html>