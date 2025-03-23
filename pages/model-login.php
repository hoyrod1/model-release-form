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
 * @link     https://model-release-form/pages/model-login.php
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Model Login Page</title>
    <link rel="stylesheet" href="../style/model-login.css" />
    <script defer src="../javascript/model-login.js"></script>
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
    <div class="admin-container">
      <h1 class="admin-h1">Model Login Page</h1>
      <div class="admin-email-div">
        <div class="admin-email-form">
          <form action="" class="admin-form">
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
            <input type="submit" value="Login" class="admin-login" />
          </form>
        </div>
      </div>
      <!---------------------------------------------------------------------------->
      <hr class="admin-hr" />
      <!---------------------------------------------------------------------------->

      <!-------------------------------- THE BUTTON -------------------------------->
      <div id="admin-div-button" class="admin-start-button-div">
        <button id="click-Me" class="admin-start-button">Click me</button>
      </div>
      <!---------------------------------------------------------------------------->
    </div>
    <footer>
      <p class="admin-footer-logo">STC media inc Technology 2008-2024</p>
    </footer>
    <video autoplay muted loop id="myVideo">
      <source src="../video/earth-from-space.mp4" type="video/mp4" />
      Your browser does not support HTML5 video.
    </video>
  </body>
</html>
