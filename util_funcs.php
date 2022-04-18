<?php

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
 * 1. util_funcs.php - a collection of functions
 * 2.
 * 3.
 * 4.
 * ---------------------------------------------------------------
 */

//
// Create a database PDO connection
// Returns the connection
// Throw exception to database_error display form
//
function dbConnect() {

    // Define local / development database connection parameters
    // $connect_string = 'mysql:host=localhost:3306;dbname=cst-323';
    // $db_username = "root";
    // $db_password = "root";

    // Define azure / publish database connection parameters
    $connect_string = 'mysql:host=127.0.0.1:55956;dbname=cst-323';
    $db_username = "azure";
    $db_password = "6#vWHD_$";

    try
    {
        // Create a PDO object
        $db_connection = new PDO($connect_string, $db_username, $db_password);
        $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e)
    {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }

    return $db_connection;
}

function saveUserId($id)
{
    session_start();
    $_SESSION["USER_ID"] = $id;
}

function getUserId()
{
    session_start();
    return $_SESSION["USER_ID"];
}

function saveUserInfo($user_info_array)
{
    session_start();
    $_SESSION["USER_INFO"] = $user_info_array;
}

function getUserInfo()
{
    session_start();
    return $_SESSION["USER_INFO"];
}

function saveSearchInfo($search_info_array)
{
    session_start();
    $_SESSION["SEARCH_INFO"] = $search_info_array;
}

function getSearchInfo()
{
    session_start();
    return $_SESSION["SEARCH_INFO"];
}

?>