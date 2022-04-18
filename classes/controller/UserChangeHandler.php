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
 * 1. AmazingStoreKLamb13 - Handle Post Edit / Delete Requests
 * 2. Obtain form data
 * 3. Handle Login Validation
 * ---------------------------------------------------------------
 */

require_once('../../util_funcs.php');

// store registration parameters
$user_id = filter_input(INPUT_GET,'id');
$mode    = filter_input(INPUT_GET,'mode'); // 0 - Edit, 1 - Delete (Disable for now)

// Validate mode operations
if ( ($mode < 0) || ($mode > 1) )
{
    echo "Invalid Request Operation - Contact Administrator.<br />";
    exit();
}

// Get user into User Model by Id
$us = new classes\business\UserBusinessService();
$user = $us->getUserById($user_id);

// Get all roles into an array
$rs = new classes\business\RoleBusinessService();
$roles = $rs->getAllRoles();

if ($mode == 0)
{
    include('../view/_editUser.php');
}
else
{
    include('../view/_deleteUser.php');
}
?>