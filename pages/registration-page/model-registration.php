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

// ob_start();
// session_start();

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
//=================================================================================//
//============================== BEGINNING OF HEADER ==============================//
require_once "../includes/header.php";
//=============================== ENDING OF HEADER ================================//
?>
<!------------------------------- BEGGINING OF BODY -------------------------------->
<?php
//========================= BEGGINING OF NAVIGATION BAR ===========================//
//require_once "/includes/nav.php";
//============================ END OF NAVIGATION BAR ==============================//
?>
<!---------------------------- BEGGINING OF MAIN SECTION --------------------------->
<hr>
  <div class="registration-form-container">
      <h1 class="form-title-h1">Registration Page</h1>
      <form action="registration_signup.php" method="POST">
          <input required type="text" name="first_name" placeholder="Enter First Name">
          <br>
          <input required type="text" name="last_name" placeholder="Enter Last Name">
          <br>
          <input required type="text" name="username" placeholder="Enter Username">
          <br>
          <input required type="email" name="email" placeholder="Enter Email">
          <br>
          <input required type="password" name="password" placeholder="Enter Password">
          <input required type="password" name="confirm_pass" placeholder="Re-Enter Password">
          <br>
          <input type="submit" name="submit" value="Sign Up">
        <div>
            Already Registered: <a href="../login-page/model-login.php">Login</a>
        </div>
      </form>     
      <!-------------------------------- THE BUTTON -------------------------------->
      <div id="admin-div-button" class="admin-start-button-div">
        <button id="click-Me" class="admin-start-button">Click me</button>
      </div>
      <!---------------------------------------------------------------------------->
  </div>
<hr>
<!------------------------------ END OF MAIN SECTION ------------------------------>
<?php
//============================= BEGGINING OF FOOTER ===============================//
require_once "includes/footer.php";
//================================ END OF FOOTER ==================================//
?>
<!---------------------------------- END OF BODY ----------------------------------->
</body>
</html>