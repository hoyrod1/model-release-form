<?php
/**
 * * @file
 * php version 8.2
 * Model Release Form Sanitize Configuration file
 * 
 * @category Model_Relase_Form_Sanitize
 * @package  Model_Relase_Form_Sanitize_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/includes/sanitize_function.php
 */
//=====================================================================//
/**
 * TestInput function sanatizes the form feilds
 *
 * @param string $data This has the users form input data
 * 
 * @access public  
 * 
 * @return mixed
 */
function testInput($data) 
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlentities($data, ENT_QUOTES, 'UTF-8');
    $data = htmlspecialchars($data);
    return $data;
}
//=====================================================================//