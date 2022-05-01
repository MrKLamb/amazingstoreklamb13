<?php
namespace classes\database;
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
 * 1. Activity 2
 * 2. Persistence Layer
 * 3. Connection manager
 * ---------------------------------------------------------------
 */

class Database
{

    public function __construct()
    {}

    //
    // Create a database PDO connection
    // Returns the connection
    // Throw exception to database_error display form
    //
    public function getConnect()
    {
        // Define local / development database connection parameters
        // $connect_string = 'mysql:host=localhost:3306;dbname=cst-323';
        // $db_username = "root";
        // $db_password = "root";

		// Define azure / publish database connection parameters
		// $connect_string = 'mysql:host=127.0.0.1:55956;dbname=cst-323';
		// $db_username = "azure";
		// $db_password = "6#vWHD_$";

		// Define azure / publish database connection parameters
		$connect_string = 'mysql:host=35.236.7.10:3306;dbname=cst-323';
		$db_username = "root";
		$db_password = "1Database4Me!";

        try
        {
            // Create a PDO object
            $db_connection = new \PDO($connect_string, $db_username, $db_password);
            $db_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e)
        {
            echo "Database Connection Error: " . $e->getMessage() . "<br />";
            exit();
        }

        return $db_connection;
    }

}

