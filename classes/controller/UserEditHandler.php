<?php
namespace classes\controller;
use classes;

require_once '../..' . '/AutoLoader.php';

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
* 1. Edit User Handler (UserEditHandler.php)
* 2. Retrieves fields from _editUser.php
* 3. Stores in database
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
$role_id   = filter_input(INPUT_POST,'UserRoleID');
$user_id   = filter_input(INPUT_POST,'UserID');

// Convert birthdate to string for insert "YYYY-MM-DD" format
$bdate = new \DateTime($birthdate);
$bdate_str = $bdate->format("Y-m-d");

// Create user business service
$service = new classes\business\UserBusinessService();

// Create a user object to update database
$user = new classes\model\User($user_id, $firstname, $lastname, $email, $mobile, $password, $bdate_str, $gender, $role_id);

// Call business service to send to database
$result = $service->updateUser($user);

// echo "<pre>\n";
// print_r($user);
// echo "Results=" . $result . "\n";
// echo "</pre>\n";
header('Location: ../view/admin_edit_user.php');

?>
