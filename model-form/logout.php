<?php
/**
 * * @file
 * php version 8.2
 * Logout Configuration file for Model Release Form
 * 
 * @category Logout_File
 * @package  Logout_File_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/logout.php
 */
require_once "../includes/session_inc.php";
session_start();
session_unset();
session_destroy();
header("Location: ../pages/login-page/model-login.php");