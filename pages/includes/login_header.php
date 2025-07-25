<?php
/**
 * * @file
 * php version 8.2
 * Login Header for Model Release Form
 * 
 * @category Model-Release-Form
 * @package  Login_Header_Configuration_Page
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/incudes/login_header.php
 */

require_once "../../includes/session_inc.php";
if (isset($_SESSION["users_name"])) {
    header("Location: ../../model-form/index.php");
    $_SESSION["login_success"] = $_SESSION["users_name"] . ' you are already logged in';
}
require_once "../view/login_view.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Model Login Page</title>
    <link rel="stylesheet" href="../style/model-login.css" />
    <!-- <script defer src="../javascript/model-login.js"></script> -->
  </head>
  <body>
    <nav>
      <ul>
        <li>
            <a class="main-nav-link" href="https://RodneyStCloud.com">
                RodneyStCloud.com
            </a>
        </li>
        <li>
            <a class="main-nav-link" href="https://StrippersInTheHood.com">
                StrippersInTheHood.com
            </a>
        </li>
        <li>
            <a class="main-nav-link" href="https://StrippersInTheHoodxxx.com/Preview/preview.html">
                StrippersInTheHoodxxx.com
            </a>
        </li>
        <li>
          <a href="../registration-page/model-registration.php">
            Register
          </a>
        </li>
      </ul>
    </nav>