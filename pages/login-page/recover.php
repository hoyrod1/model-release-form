<?php
/**
 * * @file
 * php version 8.2
 * Password Recover file for Model Release Form
 * 
 * @category Password_Recover_File
 * @package  Password_Recover_Form_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/login-page/model-login.php
 */
//=================================================================================//
//=========================== BEGINNING OF HEADER & NAV ===========================//
require_once "../includes/recover_header.php";
//============================ ENDING OF HEADER & NAV =============================//
?>
<!------------------------------- BEGGINING OF BODY -------------------------------->
<!-- <body class="recover-body" style="overflow-x: hidden;"> -->
<body class="recover-body">
<!---------------------------- BEGGINING OF MAIN SECTION---------------------------->
<div class="recover-main-container">
<div class="response-text">
<?php
  require_once "../../includes/token_generator.php";
  errorMessage();
  successMessage();
?>
</div>
<div class="recover-container">
  <hr>
  <h1 class="recover-h1">Recover Your Password</h1>
    <div class="">
        <form class="rec-form" method="POST">
            <input type="text" name="email" placeholder="Please enter or email" class="rec-inp">
            <input type="hidden" name="token_gen" value="<?= tokenGenerator(); ?>">
            <br />
            <button class="recover-button" name="recover">
                Recover Password
            </button>
            <div class="rec-login">
                Remember password: &nbsp; <a href="model-login.php" class="rec-login-anchor">login</a>
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