<?php
namespace classes\controller;
use classes;

require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';

/*
* ---------------------------------------------------------------
 * Name      : Kelly E. Lamb
 * Date      : 2022-03-28
 * Class     : CST-323 Cloud Computing
 * Professor : Bradley Mauger PhD
 * Assignment: Activity Application
 * Disclaimer: This is my own work
* ---------------------------------------------------------------
* Description:
* 1. Registration Handler (registerHandler.php)
* 2. Retrieves fields from register.html
* 3. Stores in database
* TO DO:
* 1. Validate that email does not already exist in the database
* ---------------------------------------------------------------
*/

// store registration parameters
$firstname = filter_input(INPUT_POST,'FirstName');
$lastname  = filter_input(INPUT_POST,'LastName');
$email     = filter_input(INPUT_POST,'Email');
$password  = filter_input(INPUT_POST,'Password');
$mobile    = filter_input(INPUT_POST,'Mobile');
$birthdate = filter_input(INPUT_POST,'Birthdate');
$gender    = filter_input(INPUT_POST,'Gender');
$role_id   = 1; // Default to Basic - Administrator can decide to change

// Convert birthdate to string for insert "YYYY-MM-DD" format
$bdate = new \DateTime($birthdate);
$bdate_str = $bdate->format("Y-m-d");

// Create a user business service to insert user
$service = new classes\business\UserBusinessService();

// Create a user object to pass to the service
$user = new classes\model\User(0, $firstname, $lastname, $email, $mobile, $password, $bdate_str, $gender, $role_id);

if (! $service->createUser($user) )
{
    $error_message = "Insert User Failed.";
    include('../database/database_error.php');
    exit();
}

header('Location: ../../index.php');

?>
