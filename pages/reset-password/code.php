<?php
/**
 * * @file
 * php version 8.2
 * Password Recover Code file for Model Release Form
 * 
 * @category Password_Recover_Code_File
 * @package  Password_Recover_Code_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/reset-password/code.php
 */
//=================================================================================//
//=========================== BEGINNING OF HEADER & NAV ===========================//
require_once "../includes/code_header.php";
//============================ ENDING OF HEADER & NAV =============================//
require_once "../../includes/recover_password.php";
?>
<!------------------------------- BEGGINING OF BODY -------------------------------->
<body class="code-body">
<!---------------------------- BEGGINING OF MAIN SECTION---------------------------->
<div class="code-main-container">
<hr>
<?php validateCode(); ?>
<div class="code-container">
    <h1 class="code-h1">Recover Your Password</h1>
    <div class="">
        <form class="code-form" method="POST">
            <input type="text" name="token" placeholder="########" class="code-inp">
            <br />
            <button class="code-button" name="validate_code">
                Activate
            </button>
            <div class="code-login">
                Remember password: &nbsp; 
                <a href="login.php" class="code-login-anchor">login</a>
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