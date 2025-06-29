<?php
/**
 * * @file
 * php version 8.2
 * Model Release Form Token Generator file
 * 
 * @category Model_Relase_Token_Generator
 * @package  Model_Relase_Token_Generator_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/includes/token_generator.php
 */
//=====================================================================//

//=====================================================================//
//****************** FUNCTION FOR TOKEN GENERATOR *********************//
/**
 * This function returns a generated token
 * 
 * @access public  
 * 
 * @return mixed
 */
function tokenGenerator()
{
    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    return $token;
}
//=======================================================================//