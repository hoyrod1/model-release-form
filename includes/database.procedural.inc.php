<?php
/**
 * * @file
 * php version 8.2
 * Procedural Database Page for Model Release Form
 * 
 * @category Database_Connection
 * @package  Procedural_Database_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/includes/database.procedural.inc.php
 */
$servname = "localhost";
$dbname = "model_release_form";
$username = "root";
$password = "root";
try 
{
    $dsn = "mysql:host=$servname;dbname=$dbname";

    $pdo = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Database Connection";
}
catch(PDOException $e) 
{
    die("Connected Failed: " . $e->getMessage());
}
