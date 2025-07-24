<?php
/**
 * * @file
 * php version 8.2
 * Update Model Release Form Controller Configuration file
 * 
 * @category Update_Model_Release_Form_Controller
 * @package  Update_Model_Release_Form_Controller_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/controller/update_model_release_controller.php
 */
declare(strict_types=1);
//*===============================================================================*//

//=================================================================================//
/**
 * The Is_Input_empty function checks if all the input fields are empty
 * 
 * @param string $producer_name     This param has the first name
 * @param string $model_name        This param has the last name
 * @param string $email             This param has the email
 * @param string $date_of_shoot     This param has the date of the shoot
 * @param string $location_of_shoot This param has the users username
 * @param string $payment_amount    This param has the models pay rate
 * @param string $legal_name        This param has the models legal name
 * @param string $social_security   This param has the models social security #
 * @param string $contact_number    This param has the models contact number #
 * @param string $address           This param has the models street address
 * @param string $city              This param has the city the model lives in
 * @param string $state             This param has the state the model lives in
 * @param string $zip_code          This param has the zip code the model lives in
 * @param string $country           This param has the country the model lives in
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Update_Input_empty(
  string $producer_name, 
  string $model_name, 
  string $email, 
  string $date_of_shoot, 
  string $location_of_shoot, 
  string $payment_amount, 
  string $legal_name, 
  string $social_security, 
  string $contact_number, 
  string $address, 
  string $city, 
  string $state, 
  string $zip_code,
  string $country
) {
  if (empty($producer_name)  
      || empty($model_name) 
      || empty($email)  
      || empty($date_of_shoot)  
      || empty($location_of_shoot)  
      || empty($payment_amount)  
      || empty($legal_name)  
      || empty($social_security)  
      || empty($contact_number)  
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
//*===============================================================================*//

//=================================================================================//
//*----------------------- SANITATION & VALIDATION SECTION -----------------------*//
//=================================================================================//

//*===============================================================================*//
/**
 * 1. The Is_Update_Producer_Name_valid function checks the producers name is valid
 * 
 * @param string $producer_name This param has the producer name
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Update_Producer_Name_valid(string $producer_name)
{
    if (!preg_match("/^[a-zA-Z-'\. ]*$/", $producer_name)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//*===============================================================================*//
/**
 * 1. The Is_Update_Model_Name_valid function checks the model stage  name is valid
 * 
 * @param string $model_name This param has the models stage name
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Update_Model_Name_valid(string $model_name)
{
    if (!preg_match("/^[0-9a-zA-Z-'\. ]*$/", $model_name)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//*===============================================================================*//
/**
 * 1. The Is_Update_Legal_Name_valid function checks the legal name is valid
 * 
 * @param string $print_name This param has the models legal name
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Update_Legal_Name_valid(string $print_name)
{
    if (!preg_match("/^[a-zA-Z-'\. ]*$/", $print_name)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//=================================================================================//
/**
 * 2. The Is_Update_Email_valid function checks if email entered is valid
 * 
 * @param string $email This param has the email
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Update_Email_valid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//=================================================================================//
/**
 * 3. The Is_Update_SocialSecurity_valid function checks if social security entered is valid
 * 
 * @param string $socialSecurity_number This param has the contact number
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Update_SocialSecurity_valid(string $socialSecurity_number)
{
    if (!preg_match("/^(?!666|000|9\\d{2})\\d{3}-(?!00)\\d{2}-(?!0{4})\\d{4}$/", $socialSecurity_number)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

//=================================================================================//
/**
 * 3. The Is_Update_Payment_amount function checks if models payment entered is valid
 * 
 * @param string $payment_amount This param has the payment entered
 * 
 * @access public  
 * 
 * @return mixed
 */
function Is_Update_Payment_amount(string $payment_amount)
{
    if (!preg_match("/^[\.0-9,]*$/", $payment_amount)) {
        return true;
    } else {
        return false;
    }
}
//*===============================================================================*//

// //=================================================================================//
// /**
//  * 3. The Is_Contact_valid function checks if phone number entered is valid
//  * 
//  * @param string $contact_number This param has the contact number
//  * 
//  * @access public  
//  * 
//  * @return mixed
//  */
// function Is_Contact_valid(string $contact_number)
// {
//     if (!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $contact_number)) {
//         return true;
//     } else {
//         return false;
//     }
// }
// //*===============================================================================*//

//=================================================================================//
/**
 * The Update_ModelRelease_Form_controller
 * 
 * @param object $pdo               This param has the PDO connection
 * @param string $id                This param has the model release id
 * @param string $producer_name     This param has the producers name
 * @param string $model_name        This param has the models name
 * @param string $email             This param has the models name
 * @param string $date_of_shoot     This param has the date of the shoot
 * @param string $location_of_shoot This param has the location of the shoot
 * @param string $payment_amount    This param has the models pay rate
 * @param string $legal_name        This param has the models legal name
 * @param string $social_security   This param has the models social security #
 * @param string $address           This param has the models street address
 * @param string $city              This param has the city the model lives in
 * @param string $state             This param has the state the model lives in
 * @param string $zip_code          This param has the zip code the model lives in
 * @param string $country           This param has the zip code the model lives in
 * 
 * @access public  
 * 
 * @return mixed
 */
function Update_ModelRelease_Form_controller(
  object $pdo, 
  string $id, 
  string $producer_name, 
  string $model_name, 
  string $email, 
  string $date_of_shoot, 
  string $location_of_shoot, 
  string $payment_amount, 
  string $legal_name, 
  string $social_security, 
  string $address, 
  string $city, 
  string $state, 
  string $zip_code,
  string $country
) {
  if (Update_ModelRelease_Form_model(
      $pdo, 
      $id, 
      $producer_name, 
      $model_name, 
      $email, 
      $date_of_shoot, 
      $location_of_shoot, 
      $payment_amount, 
      $legal_name, 
      $social_security, 
      $address, 
      $city, 
      $state, 
      $zip_code, 
      $country
  )
  ) {
      return true;
  } else {
      return false;
  }
}
//=================================================================================//
