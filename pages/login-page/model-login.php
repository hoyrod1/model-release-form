<?php
/**
 * * @file
 * php version 8.2
 * Login Page for Model Release Form
 * 
 * @category Model-Login-Form
 * @package  Login_Page_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/login-page/model-login.php
 */
//=========================== BEGINNING OF HEADER & NAV ===========================//
require_once "../includes/login_header.php";
//============================ ENDING OF HEADER & NAV =============================//
?>
    <hr>
    <?php 
      errorMessage();
      successMessage();
    ?>
    <div class="admin-container">
      <h1 class="admin-h1">Model Login Page</h1>
      <div class="admin-email-div">
        <div class="admin-email-form">
          <form action="model_signin.php" class="admin-form" method="POST">
            <div class="admin-email-input-div">
              <input
                type="email"
                name="email"
                id="email"
                class="admin-contact-email"
                placeholder="Enter you email"
              />
            </div>
            <div class="admin-password-input-div">
              <input
                type="password"
                name="password"
                id="password"
                class="admin-password-email"
                placeholder="Enter you password"
              />
            </div>
            <input type="submit" name="submit" value="Login" class="admin-login" />
            <!-------------------------------------------------------------------->
            <!-------------------------------------------------------------------->
            <div class="login-recover-remember">
              <a href="" class="login-anchor">Forgot Password</a>
              <br>
              <input class="log-check" type="checkbox" name="remember">
              <span> Remember Me</span>
            </div>
            <!-------------------------------------------------------------------->
          </form>
        </div>
      </div>
      <!---------------------------------------------------------------------------->
      <hr class="admin-hr" />
      <!---------------------------------------------------------------------------->

      <!-------------------------------- THE BUTTON -------------------------------->
      <div id="admin-div-button" class="admin-start-button-div">
        <button id="click-Me" class="admin-start-button">
          <a href="../registration-page/model-registration.php">
            Click me to Register
          </a>
        </button>
      </div>
      <!---------------------------------------------------------------------------->
    </div>
<?php
//============================= BEGGINING OF FOOTER ===============================//
require_once "../includes/footer.php";
//================================ END OF FOOTER ==================================//
?>
<!---------------------------- BEGINNING OF VIDEO TAG ------------------------------>
    <video autoplay muted loop id="myVideo">
      <source src="../video/earth-from-space.mp4" type="video/mp4" />
      Your browser does not support HTML5 video.
    </video>
<!------------------------------- END OF VIDEO TAG --------------------------------->
  </body>
<!---------------------------------- END OF BODY ----------------------------------->
</html>
