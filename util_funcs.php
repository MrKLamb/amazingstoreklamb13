<?php
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
require 'vendor/autoload.php';

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
    // $connect_string = 'mysql:host=127.0.0.1:55956;dbname=cst-323';
    // $db_username = "azure";
    // $db_password = "6#vWHD_$";

    // Define heroku / publish database connection parameters
    // $connect_string = 'mysql:host=u6354r3es4optspf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306;dbname=y7llsgwldz49763a';
    // $db_username = "lcm3za4yg1447b7a";
    // $db_password = "n1otv5d1jll4eam7";

    // Define google cloud / publish database connection parameters
    $connect_string = 'mysql:dbname=cst-323;unix_socket=/cloudsql/amazingstoreklamb13a:us-west2:cst-323';
    $db_username = "root";
    $db_password = "1Database4Me!";


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
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    $_SESSION["USER_ID"] = $id;
}

function getUserId()
{
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    return $_SESSION["USER_ID"];
}

function saveUserInfo($user_info_array)
{
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    $_SESSION["USER_INFO"] = $user_info_array;
}

function getUserInfo()
{
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    return $_SESSION["USER_INFO"];
}

function saveSearchInfo($search_info_array)
{
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    $_SESSION["SEARCH_INFO"] = $search_info_array;
}

function getSearchInfo()
{
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    return $_SESSION["SEARCH_INFO"];
}


function saveLogger($logger)
{
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    $_SESSION["LOGGER"] = $logger;
}

function getLogger()
{
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    return $_SESSION["LOGGER"];
}

/* DEFINE LOGGER - IF NEEDED */
$logger = getLogger();
if (! isset($logger))
{
	$logger = new Logger('AmazingStore');
	$logger->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'] . '/logs/app.log', Logger::DEBUG));
	//$logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
	saveLogger($logger);
	$logger->info('Logger is now Ready');
}

?>