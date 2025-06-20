<?php
/**
 * * @file
 * php version 8.2
 * Procedural Session Configuration file for Model Release Form
 * 
 * @category Session_Config
 * @package  Procedural_Session_Configuration
 * @author   Rodney St.Cloud <hoyrod1@aol.com>
 * @license  STC Media inc
 * @link     https://model-release-form/includes/session_inc.php
 */
//*==============================================================*//
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);
//*==============================================================*//

//*==============================================================*//
session_set_cookie_params(
    [
        'lifetime' => 1800, 
        'domain' => 'localhost', 
        'path' => '/', 
        'secure' => true, 
        'httponly' => true
    ]
);
//*==============================================================*//

//*==============================================================*//
session_start();
//*==============================================================*//

//*==============================================================*//
if (isset($_SESSION["users_id"])) {
    if (!isset($_SESSION["regeneration_set"])) {
        Regenerate_Session_Id_signedin();
    } else {
        $interval = 60*30;
        if (time() - $_SESSION["regeneration_set"] >= $interval) {
            Regenerate_Session_Id_signedin();
        }
    }
} else {
    if (!isset($_SESSION["regeneration_set"])) {
        Regenerate_Session_id();
    } else {
        $interval = 60*30;
        if (time() - $_SESSION["regeneration_set"] >= $interval) {
            Regenerate_Session_id();
        }
    }
}
//*==============================================================*//

//*==============================================================*//
/**
 * This function regenerate the session id before user logged in
 * 
 * @access public  
 * 
 * @return void
 */
function Regenerate_Session_id()
{
    session_regenerate_id(true);
    $_SESSION["regeneration_set"] = time();
}
//*==============================================================*//

//*==============================================================*//
/**
 * This function regenerate the session id after user is logged in
 * 
 * @access public  
 * 
 * @return void
 */
function Regenerate_Session_Id_signedin()
{
    session_regenerate_id(true);

    $userId = $_SESSION["users_id"];
    $mewUserSessionId = session_create_id();
    $userSessionId = $mewUserSessionId ."_". $userId;
    session_id($userSessionId);
    $_SESSION["regeneration_set"] = time();
}
//*==============================================================*//