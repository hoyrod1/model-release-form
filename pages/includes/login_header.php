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
// START SESSION TO CATCH ANY LOGIN ERRORS //
require_once "../../includes/session_inc.php";
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
    <script defer src="../javascript/model-login.js"></script>
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li>
          <a href="../registration-page/model-registration.php">Register</a>
        </li>
      </ul>
    </nav>