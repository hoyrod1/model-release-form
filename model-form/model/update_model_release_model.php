<?php
/**
 * * @file
 * php version 8.2
 * Model Release Form Model Configuration file
 * 
 * @category Model_Release_Form_Model
 * @package  Model_Release_Form_Model_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/model-form/model/model_release_model.php
 */
declare(strict_types=1);
//*============================================================================================*//

//*============================================================================================*//
/**
 * The Update_ModelRelease_Form_model updates model release form data to the database
 * 
 * @param object $pdo               This param has the PDO connection
 * @param string $model_id          This param has the id of the model release form
 * @param string $producer_name     This param has the producers name
 * @param string $model_name        This param has the models name
 * @param string $email             This param has the models name
 * @param string $date_of_shoot     This param has the date of the shoot
 * @param string $location_of_shoot This param has the location of the shoot
 * @param string $compensation      This param has the models pay rate
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
function Update_ModelRelease_Form_model(object $pdo, string $model_id, string $producer_name, string $model_name, string $email, string $date_of_shoot, string $location_of_shoot, string $compensation, string $legal_name, string $social_security, string $contact_number, string $address, string $city, string $state, string $zip_code, string $country) {
  $reg_sql  = "UPDATE model_records SET producer_name = :producer_name, 
                                        model_name = :model_name, 
                                        email = :email, 
                                        date_of_shoot = :date_of_shoot, 
                                        location_of_shoot = :location_of_shoot, 
                                        compensation = :compensation, 
                                        legal_name = :legal_name, 
                                        social_security = :social_security, 
                                        contact_number = :contact_number, 
                                        address = :address, 
                                        city = :city, 
                                        state = :state, 
                                        zip_code = :zip_code, 
                                        country = :country 
                                        WHERE model_id = :model_id";
  
  $stmt = $pdo->prepare($reg_sql);

  //BIND VARIABLE WITH INPUT PARAMETERS
  $stmt->bindValue(':producer_name', $producer_name);
  $stmt->bindValue(':model_name', $model_name);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':date_of_shoot', $date_of_shoot);
  $stmt->bindValue(':location_of_shoot', $location_of_shoot);
  $stmt->bindValue(':compensation', $compensation);
  $stmt->bindValue(':legal_name', $legal_name);
  $stmt->bindValue(':social_security', $social_security);
  $stmt->bindValue(':contact_number', $contact_number);
  $stmt->bindValue(':address', $address);
  $stmt->bindValue(':city', $city);
  $stmt->bindValue(':state', $state);
  $stmt->bindValue(':zip_code', $zip_code);
  $stmt->bindValue(':country', $country);
  $stmt->bindValue(':model_id', $model_id);
  $execute = $stmt->execute();
  return $execute;
}
//*============================================================================================*//