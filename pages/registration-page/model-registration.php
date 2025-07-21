<?php
/**
 * * @file
 * php version 8.2
 * Registration File For strippersinthehoodxxx.com Model-Release-Form
 * 
 * @category Model-Registration
 * @package  Registration_Form
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/registration-page/model-register.php
 */
// START SESSION TO CATCH ANY REGISTRATION ERRORS //
require_once "../../includes/session_inc.php";
require_once "../view/registration_view.php";
//=================================================================================//
/**
 * Function sets the page title
 * 
 * @access public  
 * 
 * @return string
 */
function title()
{
    return $title = "Model Release Registration Page";
}
//==================================================================================//
//============================== BEGINNING OF HEADER ===============================//
require_once "../includes/registration_header.php";
//=============================== ENDING OF HEADER =================================//
?>
<!------------------------------- BEGGINING OF BODY --------------------------------->
<?php
//========================= BEGGINING OF NAVIGATION BAR ============================//
//require_once "/includes/nav.php";
//============================ END OF NAVIGATION BAR ===============================//
?>
<!---------------------------- BEGGINING OF MAIN SECTION ---------------------------->
<hr>
<?php 
  errorMessage();
  successMessage();
?>
<div class="form-container">
 <!-- <h2>Register</h2>
  <form id="registrationForm" novalidate>
    <div class="form-group">
      <label for="first_name">first name</label>
      <input
        type="text" 
        name="first_name" 
        placeholder="Enter First Name"
        required minlength="3"
        required
        >
      <div class="error-message">
        First name is required (min 3 characters).
      </div>
    </div>
    <div class="form-group">
      <label for="last_name">Last name</label>
      <input 
        type="text" 
        name="last_name" 
        placeholder="Enter Last Name"
        required minlength="3"
        required
        >
      <div class="error-message">
        Last name is required (min 3 characters).
      </div>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        placeholder="Enter Email"
        required
        >
      <div class="error-message">
        Please enter a valid email.
      </div>
    </div>
    <div class="form-group">
      <label for="contact_number">Phone Number</label>
      <input 
        type="text" 
        id="contact_number" 
        name="contact_number" 
        placeholder="Enter Phone Number"
        required
        >
      <div class="error-message">
        Please enter a United States phone number.
      </div>
    </div>
    <div class="form-group">
      <label for="model-name">Model name</label>
      <input
        type="text" 
        name="model-name" 
        placeholder="Enter Model Name"
        required
        >
      <div class="error-message">
        Model name is required.
      </div>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input 
        type="password" 
        id="password" 
        name="password" 
        placeholder="Enter Password"
        required minlength="6">
      <div class="error-message">
        Password must be at least 6 characters.
      </div>
    </div>

    <div class="form-group">
      <label for="confirm_pass">Confirm Password</label>
      <input 
        type="password" 
        id="confirm_pass"
        name="confirm_pass" 
        placeholder="Confirm Password"
        required
        >
      <div class="error-message">Passwords must match.</div>
    </div>

    <button type="submit" name="submit" class="button-submit">
      Sign Up
    </button>
    <div class="form-footer">
      Already have an account?
      <a href="../login-page/model-login.php">
        Login
      </a>
    </div>
  </form>
</div> 
<------------------------------------------------------------------------------------------------------>
    <div class="registration-form-container">
      <h2 class="form-title-h1">Register To Sign Model Release Form</h2>
      <form style="padding: 5px;" class="reg-form" action="registration_signup.php" method="POST">
          <input
            style="width:50%; margin: auto;"
            type="text" 
            name="first_name" 
            placeholder="Enter First Name"
            required minlength="3"
            required
            value="<?php echo htmlspecialchars($_SESSION['form_first_name'] ?? '', ENT_QUOTES); ?>"
            >
          <br>
          <input 
            style="width:50%; margin: auto;"
            type="text" 
            name="last_name" 
            placeholder="Enter Last Name"
            required
            value="<?php echo htmlspecialchars($_SESSION['form_lasst_name'] ?? '', ENT_QUOTES); ?>"
            >
          <br>
          <input 
            style="width:50%; margin: auto;"
            type="email" 
            name="email" 
            placeholder="Enter Email"
            required
            value="<?php echo htmlspecialchars($_SESSION['form_email'] ?? '', ENT_QUOTES); ?>"
            >
          <br>
          <input 
            style="width:50%; margin: auto;"
            type="text" 
            name="contact_number" 
            placeholder="Enter Phone Number"
            required
            value="<?php echo htmlspecialchars($_SESSION['form_phone_number'] ?? '', ENT_QUOTES); ?>"
            >
          <br>
          <input 
            style="width:50%; margin: auto;"
            type="text" 
            name="model-name" 
            placeholder="Enter Model Name"
            required
            value="<?php if(isset($_SESSION['form_model_name'])){ echo htmlspecialchars($_SESSION['form_model_name'], ENT_QUOTES);}?>"
            >
          <br>
          <input 
            style="width:50%; margin: auto;"
            type="password" 
            name="password" 
            placeholder="Enter Password"
            required
            >
          <br>
          <input 
            style="width:50%; margin: auto;"
            type="password" 
            name="confirm_pass" 
            placeholder="Confirm Password"
            required
            >
          <br>
          <input 
            style="width:50%; margin: auto;"
            type="submit" 
            name="submit" 
            value="Sign Up"
            >
        <div style="margin: 20px auto; width: 50%;">
            Already Registered: <a href="../login-page/model-login.php">Login</a>
        </div>
      </form>     
  </div>
<!-- ---------------------------- END OF MAIN SECTION ------------------------------ -->
<?php
//============================= BEGGINING OF FOOTER ===============================//
require_once "../includes/footer.php";
//================================ END OF FOOTER ==================================//
?>
<!-- //-------------------------------- END OF BODY -----------------------------------// -->
</body>
</html>