<?php
/**
 * * @file
 * php version 8.2
 * Model Landing Page Configuration file
 * 
 * @category Model_Landing_Page
 * @package  Model_Landing_Page_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/index.php
 */
require_once "../includes/session_inc.php";
if (!isset($_SESSION["users_name"])) {
    $userMessage = $_SESSION["users_name"] . ' you are already logged in';
    $_SESSION["login_success"] = $userMessage;
    header("Location: ../pages/login-page/model-login.php");
}
require_once "../pages/view/login_view.php";
require_once "view/model_release_view.php";
$producer = "Rodney St. Cloud";
$current_date = date("m-d-Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_SESSION["users_name"]; ?> Profile Page</title>
  <link rel="stylesheet" href="style/index.css">
</head>
<body>
  <nav style="margin: 15px 0 0 0;">
    <ul class="nav-ul-link" style="margin: 0 0 0 30px;">
      <li class="nav-link" style=" list-style-type: none; ">
        <a href="../model-form/logout.php" class="nav-anchor">
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
      <section class="model-section">
        <div class="section-one">
          <div class="title">
            <img class="head-shot" src="./images/Rodney_HeadShot.jpeg" alt="" />
            <h1 class="model-name">
              Hello <?php echo $_SESSION["users_name"]; ?>
            </h1>
            <h3 class="model-stage-name">
              AKA: <?php echo $_SESSION["users_model_name"]; ?>
            </h3>
            <div class="section-two">
              <p class="description">
                Hello <?php echo $_SESSION["users_model_name"]; ?>, 
                if this is your first time signing the model release form
                please click the link that say "Click me to sign model release form"
                <br>
                but if you want to update your model release form please click the
                link that says "Update your model release form"
              </p>
            </div>
          </div>
        </div>
      </section>
      <hr />
      <!---------------------------------------------------------------------------->
      <!---------------------------------------------------------------------------->
      </section>
      <!-------------------------------- THE BUTTON -------------------------------->
      <?php
        if (isset($_SESSION["users_id"])) {
            $form_button_A = '
            <div id="index-div-button" class="index-div-button">
              <button id="index-button" class="index-button">
                <a href="model_release_form.php">
                  Click me to sign model release form
                </a>
              </button>
              <button id="index-button" class="index-button">
                <a href="model_release_form.php">
                  Update your model release form
                </a>
              </button>
            </div>';
            echo $form_button_A;
        } else {
            $form_button_B = '
            <div id="index-div-button" class="index-div-button">
              <button id="index-button" class="index-button">
                <a href="model_release_form.php">
                  Click me to sign model release form
                </a>
              </button>
            </div>';
            echo $form_button_B;
        }
        ?>
      <!---------------------------------------------------------------------------->
    </div>
    <!---------------------------------------------------------------------------->
    <footer class="footer-logo">
      Copyright © STC Media inc Model Relase Registration-Login System inc 
      2008 - <?php echo date("Y"); ?>
    </footer>
    <!---------------------------------------------------------------------------->
</body>
</html>