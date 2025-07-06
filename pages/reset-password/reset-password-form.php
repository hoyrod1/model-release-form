<?php
/**
 * * @file
 * php version 8.2
 * Reset Password Form file
 * 
 * @category Reset_Password_Form
 * @package  Reset_Password_Form_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/reset-password/reset-password-form.php
 */
//======================================================================================//
date_default_timezone_set('America/New_York');
//=========================== BEGINNING OF HEADER & NAV ===========================//
require_once "../includes/code_header.php";
//============================ ENDING OF HEADER & NAV =============================//
?>
<!------------------------------- BEGGINING OF BODY -------------------------------->
<body class="code-body">
<!---------------------------- BEGGINING OF MAIN SECTION---------------------------->
<div class="code-main-container">
    <div class="code-container">
        <hr>
            <h1 class="code-h1">Enter new password</h1>
            <div class="">
                <form class="code-form" action="new_password_processor.php" method="POST">
                    <input type="text" name="password" placeholder="Please enter your new password" class="code-inp">
                    <br />
                    <input type="text" name="confirm_password" placeholder="Re-enter enter your new password" class="code-inp">
                    <br />
                    <button class="code-button" name="submit_change">
                        Create new password
                    </button>
                    <div class="code-login">
                        Remember password: &nbsp; 
                        <a href="../login-page/model-login.php" class="code-login-anchor">login</a>
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
