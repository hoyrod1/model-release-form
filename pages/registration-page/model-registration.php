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
    <div class="registration-form-container">
      <h1 class="form-title-h1">Register To Sign Model Release Form</h1>
      <form class="reg-form" action="registration_signup.php" method="POST">
          <input
            type="text" 
            name="first_name" 
            placeholder="Enter First Name"
            required
            >
          <br>
          <input 
            type="text" 
            name="last_name" 
            placeholder="Enter Last Name"
            required
            >
          <br>
          <input 
            type="email" 
            name="email" 
            placeholder="Enter Email"
            required
            >
          <br>
          <input 
            type="text" 
            name="contact_number" 
            placeholder="Enter Phone Number"
            required
            >
          <br>
          <input 
            type="text" 
            name="model-name" 
            placeholder="Enter Model Name"
            required
            >
          <br>
          <input 
            type="password" 
            name="password" 
            placeholder="Enter Password"
            required
            >
          <input 
            type="password" 
            name="confirm_pass" 
            placeholder="Confirm Password"
            required
            >
          <br>
          <input 
            type="submit" 
            name="submit" 
            value="Sign Up"
            >
        <div style="margin: 20px 0 0 0;">
            Already Registered: <a href="../login-page/model-login.php">Login</a>
        </div>
      </form>     
      <!-------------------------------- THE BUTTON -------------------------------->
      <!-- <div id="admin-div-button" class="admin-start-button-div">
        <button id="click-Me" class="admin-start-button">Click me</button>
      </div> -->
      <!---------------------------------------------------------------------------->
  </div>
<!------------------------------ END OF MAIN SECTION ------------------------------>
<?php
//============================= BEGGINING OF FOOTER ===============================//
require_once "../includes/footer.php";
//================================ END OF FOOTER ==================================//
?>
<!---------------------------------- END OF BODY ----------------------------------->
</body>
</html>