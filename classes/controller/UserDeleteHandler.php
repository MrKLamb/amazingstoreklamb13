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
* 1. Edit User Handler (UserEditHandler.php)
* 2. Retrieves fields from _editUser.php
* 3. Stores in database
* ---------------------------------------------------------------
*/

require_once('../../util_funcs.php');

// store registration parameters
// $firstname = filter_input(INPUT_POST,'FirstName');
// $lastname  = filter_input(INPUT_POST,'LastName');
// $email     = filter_input(INPUT_POST,'Email');
// $password  = filter_input(INPUT_POST,'Password');
// $mobile    = filter_input(INPUT_POST,'Mobile');
// $birthdate = filter_input(INPUT_POST,'Birthdate');
// $gender    = filter_input(INPUT_POST,'Gender');
// $role_id   = filter_input(INPUT_POST,'UserRoleID');
$user_id   = filter_input(INPUT_POST,'UserID');

// Get a user business service to delete user
$service = new classes\business\UserBusinessService();
$result = $service->deleteUserById($user_id);

if (! $result)
{
    $error_message = "Delete Failed - Contact Administrator";
    include('../database/database_error.php');
    exit();
}

header('Location: ../view/admin_edit_user.php');

?>
