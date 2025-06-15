<?php
/**
 * * @file
 * php version 8.2
 * Model Relase Form Controller Configuration file
 * 
 * @category Model_Relase_Form_Controller
 * @package  Model_Relase_Form_Controller_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/model/model_release_controller.php
 */
declare(strict_types=1);
//*=========================================================================*//

//*=========================================================================*//
/**
 * The Is_Input_empty function checks if all the input fields are empty
 * 
 * @param string $producer_name     This param has the first name
 * @param string $model_name        This param has the last name
 * @param string $date_of_shoot     This param has the  contact number
 * @param string $email             This param has the email
 * @param string $location_of_shoot This param has the users username
 * @param string $payment_amount    This param has the password
 * @param string $print_name        This param has the confirmed password
 * @param string $social_security   This param has the confirmed password
 * @param string $address           This param has the confirmed password
 * @param string $city              This param has the confirmed password
 * @param string $state             This param has the confirmed password
 * @param string $zip_code          This param has the confirmed password
 * @param string $country           This param has the confirmed password
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Input_empty(
    string $producer_name, 
    string $model_name, 
    string $date_of_shoot, 
    string $email, 
    string $location_of_shoot, 
    string $payment_amount, 
    string $print_name, 
    string $social_security, 
    string $address, 
    string $city, 
    string $state, 
    string $zip_code,
    string $country
) {
    if (empty($producer_name)  
        || empty($model_name) 
        || empty($date_of_shoot)  
        || empty($email)  
        || empty($location_of_shoot)  
        || empty($payment_amount)  
        || empty($print_name)  
        || empty($social_security)  
        || empty($address)  
        || empty($city)  
        || empty($state)  
        || empty($zip_code)
        || empty($country)
    ) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//=================================================================================//
//*----------------------- SANITATION & VALIDATION SECTION -----------------------*//
//=================================================================================//

//*=========================================================================*//
/**
 * 1. The Is_Name_valid function checks the producers, model name, name is valid
 * 
 * @param string $producer_name This param has the producer name
 * @param string $model_name    This param has the models stage name
 * @param string $print_name    This param has the models name
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Name_valid(string $producer_name, string $model_name, string $print_name)
{
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_ProducerName = filter_var($producer_name, FILTER_SANITIZE_STRING);
    $filtered_ModelName = filter_var($model_name, FILTER_SANITIZE_STRING);
    $filtered_PrintName = filter_var($print_name, FILTER_SANITIZE_STRING);
    //----------------------------------------------------------------------//
    if (!preg_match("/^[a-zA-Z-'\. ]*$/", $filtered_ProducerName) 
        || !preg_match("/^[a-zA-Z-'\. ]*$/", $filtered_ModelName)
        || !preg_match("/^[a-zA-Z-'\. ]*$/", $filtered_PrintName)
    ) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * 2. The Is_Email_valid function checks if email entered is valid
 * 
 * @param string $email This param has the email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Email_valid(string $email)
{
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_Email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //----------------------------------------------------------------------//
    if (!preg_match("/[a-zA-Z0-9._]{3,}@[a-zA-Z0-9._]{3,}.{1}[a-zA-Z0-9._]{2,}/", $filtered_Email)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

//*=========================================================================*//
/**
 * 3. The Is_SocialSecurity_valid function checks if social security entered is valid
 * 
 * @param string $socialSecurity_number This param has the contact number
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_SocialSecurity_valid(string $socialSecurity_number)
{
    //--------------------------- SANATIZED DATA ---------------------------//
    $filtered_socialSecurity = filter_var($socialSecurity_number, FILTER_SANITIZE_STRING);
    //----------------------------------------------------------------------//
    if (!preg_match("/^(?!666|000|9\\d{2})\\d{3}-(?!00)\\d{2}-(?!0{4})\\d{4}$/", $filtered_socialSecurity)) {
        return true;
    } else {
        return false;
    }
}
//*=========================================================================*//

// //*=========================================================================*//
// /**
//  * 4. The Is_Model_Name_valid function checks if the model name entered is valid
//  * 
//  * @param string $model_name This param has the users username
//  * 
//  * @access public  
//  * 
//  * @return mixed
//  */
// function Is_Model_Name_valid(string $model_name)
// {
//     //--------------------------- SANATIZED DATA ---------------------------//
//     $filtered_Model_Name = filter_var($model_name, FILTER_SANITIZE_STRING);
//     //----------------------------------------------------------------------//
//     if (!preg_match("/^[0-9A-Za-z ]{6,16}$/", $filtered_Model_Name)) {
//         return true;
//     } else {
//         return false;
//     }
// }
// //*=========================================================================*//
