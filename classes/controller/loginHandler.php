<?php
namespace classes\controller;
use classes;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once '../..' . '/AutoLoader.php';
require '../..' . '/vendor/autoload.php';
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
 * 1. AmazingStore - Handle Login Entry
 * 2. Obtain form data
 * 3. Handle Login Validation
 * ---------------------------------------------------------------
 */

include_once '../../header.php';
require_once('../../util_funcs.php');

// LOGGER DEFINE in util_funcs - placed in session
$logger = getLogger();
$logger->info(basename(__FILE__, '.php') . "::login: Enter");

// store registration parameters
$email    = filter_input(INPUT_POST,'Email');
$password = filter_input(INPUT_POST,'Password');

// Validate user entry
$valid_input = true;

// Validate user email
// Note: Applying required on the html field(s) makes this unnecessary
if (is_null($email) || empty($email)) {
    $valid_input = false;
    echo "The Email field is a required field and cannot be blank.<br />";
    $logger->info("loginHandler::login: Login Failed: Email Blank");
}

// Validate password
if (is_null($password) || empty($password)) {
    $valid_input = false;
    echo "The Password field is a required field and cannot be blank.<br />";
    $logger->info(get_class($this) . "::login: Login Failed: Password Blank");
}

// Clear the search criteria at login - eases logic for blog display
$search_info = array("");
saveSearchInfo($search_info);

// Check and continue only if input fields are valid
if ($valid_input)
{
    try
    {
        // Test Security Service - Validate Login Functionality
        $service = new classes\business\SecurityService();
        $service = new classes\utility\LogInterceptor($service); // Try Interceptor Logging
        $validLogin = $service->authenticate($email, $password);

        // Get Database Connection
        $db = dbConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT * FROM users WHERE EMAIL = :email AND PASSWORD = :pass";
        $statement1 = $db->prepare($sql);
        $statement1->bindValue(':email', $email);
        $statement1->bindValue(':pass',  $password);

        // Execute query
        $statement1->execute();
        $row = $statement1->fetchAll(\PDO::FETCH_ASSOC);
        $num_rows = count($row);

        // Determine if login successful
        if ($num_rows === 1)
        {
            // Valid user
            $_SESSION["principle"] = true;

            // Save User ID in Session
            saveUserId($row[0]["ID"]);
            saveUserInfo($row);
		    $logger->info(basename(__FILE__, '.php') . "::login: Successful");
            header('Location: ../../index.php'); // Redirect to home page on success
        }
        elseif ($num_rows === 0 || $num_rows >= 2)
        {
            // Invalid user
		    $logger->info(basename(__FILE__, '.php') . "::login: Failed: Invalid User");
            $_SESSION["principle"] = false;
            include('../view/loginFailed.php ');
        }
    } catch(\PDOException $e)
    {
        $error_message = $e->getMessage();
        include('../database/database_error.php');
	    $logger->error(basename(__FILE__, '.php') . "::login: Database: " . $error_message);
        exit();
    }

    // Close statement and connection
    $statement1->closeCursor();
    $statement1 = null;
    $db = null;

    $logger->info(basename(__FILE__, '.php') . "::login: Exit");
}

?>
