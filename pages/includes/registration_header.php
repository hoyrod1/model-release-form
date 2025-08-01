<?php
/**
 * * @file
 * php version 8.2
 * Header for Model Release Form
 * 
 * @category Model-Release-Form
 * @package  Header_Configuration_Page
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/pages/incudes/registration_header.php
 */
require_once "../../includes/session_inc.php";
if (isset($_SESSION["users_name"])) {
    header("Location: ../../model-form/index.php");
    $_SESSION["login_success"] = $_SESSION["users_name"] . ' you are already logged in';
}
?>
<!-------------------------------------------------------------------------------------->
<!DOCTYPE html>
    <html>
        <head>
            <!------------------ BEGINNING OF META DESCRIPTION ------------------>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Comapatible" content="ie-edge">
            <meta name="description" content="Model Release Registration System" />
            <!------------------- ENDING OF META DESCRIPTION -------------------->

            <!---------------------- BEGINNING OF CSS FILES ---------------------->
            <link rel="stylesheet" href="../style/model-registration.css" />
            <link
              rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"
            />
            <!------------------------ ENDING OF CSS FILES ----------------------->
            <title> <?php echo title(); ?></title>
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
                <a href="../login-page/model-login.php">Login</a>
              </li>
            </ul>
          </nav>
<!-------------------------------------------------------------------------------------->