<?php
/**
 * * @file
 * php version 8.2
 * Reset Password file for Model Release Form
 * 
 * @category Reset_Password_File
 * @package  Reset_Password_File_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/reset-password/reset-password.php
 */
//=================================================================================//
//=========================== BEGINNING OF HEADER & NAV ===========================//
require_once "../includes/reset_password_header.php";
//============================ ENDING OF HEADER & NAV =============================//
?>
<!------------------------------- BEGGINING OF BODY -------------------------------->
<body class="recover-body">
<!---------------------------- BEGGINING OF MAIN SECTION---------------------------->
<div class="recover-main-container">
  <div class="response-text">
  <?php
    require_once "../view/reset_password_view.php";
    require_once "../../includes/token_generator.php";
    successMessage();
    errorMessage();
  ?>
  </div>
  <div class="recover-container">
    <hr>
        <h2 class="recover-h2">Enter Your Email To Reset Your Password</h2>
        <div class="">
            <form class="rec-form" action="reset_password_processor.php" method="POST">
                <input type="text" name="email" placeholder="Please enter or email" class="rec-inp">
                <input type="hidden" name="token_gen" value="<?= tokenGenerator(); ?>">
                <br />
                <button class="recover-button" name="recover">
                    Reset Password
                </button>
                <div class="rec-login">
                    Remebered your password: &nbsp; <a href="../login-page/model-login.php" class="rec-login-anchor">login</a>
                </div>
            </form>
        </div>
      <hr>
    </div>
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