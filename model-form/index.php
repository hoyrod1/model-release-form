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
//=========================================================//
require_once "../includes/session_inc.php";
//== REQUIRE THE login_view.php TO DISPLAY LOGIN SUCCESS ==//
require_once "../pages/view/login_view.php";
//========== REQUIRE THE model_release_view.php ===========//
require_once "view/model_release_view.php";
//======= REQUIRE THE update_model_release_view.php =======//
require_once "view/update_model_release_view.php";
//=========================================================//

//=========================================================//
if (!isset($_SESSION["users_name"])) {
    $userMessage = 'Please login';
    $_SESSION["login_error"] = $userMessage;
    header("Location: ../pages/login-page/model-login.php");
}
//=========================================================//
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
        <a href="includes/logout.php" class="nav-anchor">
            Log Out
        </a>
      </li>
    </ul>
  </nav>
  <?php
      successMessage();
      modelReleaseFormErrorMessage();
      updateModelReleaseFormErrorMessage();
      modelReleaseFormSuccessMessage();
      updateModelReleaseFormSuccessMessage();
    ?>
  <div class="container">
      <section class="model-section">
        <div class="section-one">
          <div class="title">
            <div class="admin-div" style="margin: 0 0 30px 0; display: flex; gap: 30px; align-items: center;">
              <img class="head-shot" src="./images/Rodney_HeadShot.jpeg" alt="" />
              <h1 class="model-name">
                Hello <?php echo $_SESSION["users_name"]; ?> aka <span class="model-stage-name">(<?php echo $_SESSION["users_model_name"]; ?>)</span>,
                <br>
                welcome to the digital model release Form
              </h1>
            </div>
            
            <div class="section-two">
              <p class="description">
                <!-- Hello <?php echo $_SESSION["users_model_name"]; ?>,
                <br> -->
                if this is your first time signing the model release form
                please click the link that says 
                <span style="color:rgba(255, 166, 0, 0.685);">
                  "Click to sign and submit your model release form"
                </span>
                <br>
                <br>
                If you want to email and download a copy of your model release form click 
                <span style="color:rgba(255, 166, 0, 0.685);">
                  "Click here to email & download a copy of your model release form"
                </span>
                <br>
                <br>
                if you want to update your info on your model release form please click the link that says 
                <span style="color:rgba(255, 166, 0, 0.685);">
                  "Click here to update your existing model release form"
                </span>
              </p>
            </div>
          </div>
        </div>
      </section>
      <hr />
      <!---------------------------------------------------------------------------->
      <!---------------------------------------------------------------------------->
      </section>
      <!---------------------------- DISPLAY THE BUTTON ---------------------------->
      <?php
        try {
            //=========================================================//
            //============ REQUIRE THE DATBASE CONNECTION ============//
            include_once "../includes/database.procedural.inc.php";
            //========== REQUIRE THE model_release_model.php =========//
            include_once "model/model_release_model.php";
            //========= REQUIRE THE model_release_controller =========//
            include_once "controller/model_release_controller.php";
            //=========================================================//

            //-----------------------------------------------------------------------//
            $model_email = htmlspecialchars($_SESSION["users_email"]);
            // CHECK IF MODEL RELEASE FORM DOES NOT EXIST USING EMAIL TO CHECK
            if (Get_ModelRelease_Form_controller($pdo, $model_email)) {
                $form_button_A = '
                <div id="index-div-button" class="index-div-button">
                  <button id="index-button" class="index-button">
                    <a href="model_release_form/model_release_form.php">
                      Click to sign and submit your model release form
                    </a>
                  </button>
                </div>
                ';
                echo $form_button_A;
            } else // ELSE IF THE RELEASE FORM EXIST THE MODEL CAN CREATE, UPDATE OR DOWNLOAD IT
            {
                $form_button_B = '
                  <div id="index-div-button" class="index-div-button">
                    <button id="index-button" class="index-button">
                      <a href="generateModelReleaseToPDF/emailModelReleaseForm.php">
                        Click here to email a copy of your model release form
                      </a>
                    </button>
                    <button id="index-button" class="index-button">
                      <a href="generateModelReleaseToPDF/generateModelReleaseToPDF.php">
                        Click here to generate and download a copy of your model release form
                      </a>
                    </button>
                    <button id="index-button" class="index-button">
                      <a href="update_model_release_form/update_model_release_form.php">
                        Click here to update your existing model release form
                      </a>
                    </button>
                  </div>
                ';
                echo $form_button_B;
            }
            //-----------------------------------------------------------------------//
        }
        catch(PDOException $e) 
        {
            die("Connected Failed: " . $e->getMessage());
        }
        ?>
      <!---------------------------------------------------------------------------->
    </div>
    <!---------------------------------------------------------------------------->
    <footer class="footer-logo">
      Copyright © STC Media inc Model Relase Registration-Login System  
      2008 - <?php echo date("Y"); ?>
    </footer>
    <!---------------------------------------------------------------------------->
</body>
</html>