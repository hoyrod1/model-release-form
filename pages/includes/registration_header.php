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

            <!---------------------- BEGINNING OF fAVICON ----------------------->
            <!-- <link rel="icon" href="img/favicon_desktop.png" />
            <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
            <link rel="manifest" href="manifest.webmanifest" /> -->
            <!------------------------ ENDING OF fAVICON ------------------------>

            <!------------------ BEGINNING OF JAVASCRIPT FILES ------------------>
            <!-- <script defer src="./date-file.js"></script> -->
            <!-- <script defer src="../javascript/model-registration.js"></script> -->
            <!-- <script
              type="module"
              src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
            ></script>
            <script
              nomodule=""
              src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"
            ></script> -->
            <!-------------------- ENDING OF JAVASCRIPT FILES -------------------->

            <!---------------------- BEGINNING OF CSS FILES ---------------------->
            <link rel="stylesheet" href="../style/model-registration.css" />
            <link
              rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"
            />
            <!-- <link
              rel="stylesheet"
              href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css"
            /> -->
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