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
date_default_timezone_set('America/New_York');
//=========================== BEGINNING OF HEADER & NAV ===========================//
require_once "../includes/code_header.php";
//============================ ENDING OF HEADER & NAV =============================//
if (isset($_GET['Email']) && isset($_GET['Code'])) {
    include_once "validate_url_token.php";
    $token = $_GET['Code'];
    Validate_Url_token($token);
} else {
    $_SESSION['reset_password_error'] = "There was an error, please enter your email";
    header("Location: reset-password.php");
    die();
}

?>
<!------------------------------- BEGGINING OF BODY -------------------------------->
<body class="code-body">
<!---------------------------- BEGGINING OF MAIN SECTION---------------------------->
<div class="code-main-container">
    <div class="code-container">
        <hr>
            <h1 class="code-h1">Re-enter your email</h1>
            <div class="">
                <form class="code-form" action="validate_token_processor.php" method="POST">
                    <input type="text" name="email" placeholder="Please re-enter your email address" class="code-inp">
                    <input type="hidden" name="token" value="<?= $token; ?>">
                    <br />
                    <button class="code-button" name="validate_token">
                        Activate
                    </button>
                    <div class="code-login">
                        Remember password: &nbsp; 
                        <a href="../login-page/model-login.php" class="code-login-anchor">
                            login
                        </a>
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