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
      <section class="author-section">
        <div class="section-one">
          <div class="title">
            <img class="head-shot" src="./images/Rodney_HeadShot.jpeg" alt="" />
            <div class="head-author">
              <h1 class="head-1-author">
                Hello <?php echo $_SESSION["users_name"]; ?>
              </h1>
              <h4 class="head-4-author">
                AKA: <?php echo $_SESSION["users_model_name"]; ?>
              </h4>
            </div>
            <div class="author-details">
              <table>
                <tr class="row-data-1">
                  <td>Name:</td>
                  <td>Birthday:</td>
                  <td>Address:</td>
                  <td>Phone:</td>
                  <td>Email:</td>
                  <td>Website:</td>
                </tr>
              </table>
              <table>
                <tr class="row-data-2">
                  <td>Rodney St. Cloud</td>
                  <td>December 3, 1973</td>
                  <td>1822 Lafeyette av Bronx, NY 10473</td>
                  <td>718-862-7859</td>
                  <td>trainhoyrod1@aol.com</td>
                  <td>
                    <a class="url-color" href="https://KadenStCloud.com" target="_blank">
                      www.KadenStCloud.com
                    </a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="section-two">
          <p class="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam eaque et
            facere optio officia necessitatibus aperiam, facilis esse ipsum. Nobis,
            voluptatem modi. Debitis officiis unde natus quam rerum expedita optio. Lorem
            ipsum dolor sit amet consectetur adipisicing elit. Laboriosam eaque et facere
            optio officia necessitatibus aperiam, facilis esse ipsum. Nobis, voluptatem
            modi. Debitis officiis unde natus quam rerum expedita optio?
          </p>
        </div>
      </section>
      <hr />
        <!-------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------->
      </section>
      <!-------------------------------- THE BUTTON -------------------------------->
      <div id="index-div-button" class="index-div-button">
        <button id="index-button" class="index-button">
          <a href="model_release_form.php">
            Click me to sign model release form
          </a>
        </button>
      </div>
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