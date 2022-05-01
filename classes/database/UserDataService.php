<?php
namespace classes\database;
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
 * 1. AmazingStoreKLamb13
 * 2. Database Layer
 * 3. User information
 * ---------------------------------------------------------------
 */

/**
 * @author Kelly Lamb
 *
 */
class UserDataService
{

    public function __construct()
    {}

    public function findByFirstName($searchPattern)
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT * " .
               "  FROM users " .
               " WHERE FIRST_NAME LIKE :searchPattern " .
               " ORDER BY LAST_NAME ASC, FIRST_NAME ASC";
        $statement = $connection->prepare($sql);

        $searchPattern = '%' . $searchPattern . '%';
        $statement->bindValue(':searchPattern', $searchPattern);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        // Read all users into a 2 dimensional Array where each Row in the Array
        // is a User ID at [0], First Name at [1], and Last Name at [2]
        $users = array();
        $index = 0;
        while ($row = $statement->fetch())
        {
            $users[$index] = array($row["ID"],
                                   $row["FIRST_NAME"],
                                   $row["LAST_NAME"],
                                   $row["EMAIL"],
                                   $row["MOBILE"],
                                   $row["PASSWORD"],
                                   $row["BIRTHDATE"],
                                   $row["GENDER"],
                                   $row["ROLE_ID"]);
            ++$index;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;

        // Return null if zero records found
        if (count($users) == 0)
        {
            return null;

        }
        else
        {
            return $users;
        }
    }

    public function getAllUsers()
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT u.*, r.ROLENAME " .
               "  FROM users u, roles r " .
               "  WHERE u.ROLE_ID = r.ID " .
               " ORDER BY u.LAST_NAME, u.FIRST_NAME";
        $statement = $connection->prepare($sql);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        // add records to users array
        $users = array();
        $index = 0;
        while ($row = $statement->fetch())
        {
            $users[$index] = array($row["ID"],
                                   $row["FIRST_NAME"],
                                   $row["LAST_NAME"],
                                   $row["EMAIL"],
                                   $row["MOBILE"],
                                   $row["PASSWORD"],
                                   $row["BIRTHDATE"],
                                   $row["GENDER"],
                                   $row["ROLE_ID"],
                                   $row["ROLENAME"] );
            ++$index;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        if (count($users) == 0)
        {
            return null;

        }
        else
        {
            return $users;
        }
    }

    /**
     * @param id - Model containing user information
     * @return classes\model\User Model
     */
    public function getUserById($id)
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT u.* " .
               "  FROM users u " .
               " WHERE u.ID = :id";
        $statement = $connection->prepare($sql);

        $statement->bindValue(':id', $id);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        $row = $statement->fetch();

        $user = new classes\model\User($row["ID"],
                                       $row["FIRST_NAME"],
                                       $row["LAST_NAME"],
                                       $row["EMAIL"],
                                       $row["MOBILE"],
                                       $row["PASSWORD"],
                                       $row["BIRTHDATE"],
                                       $row["GENDER"],
                                       $row["ROLE_ID"]);

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return $user;

    }

    public function delete($id)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = " DELETE FROM users " .
                   "  WHERE ID = :id";

            $statement = $connection->prepare($sql);
            $statement->bindValue(':id',  $id);

            // Execute delete stateent
            $statement->execute();

        } catch (\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('../database/database_error.php');
            return false;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return true;
    }

    /**
     * @param user User - Model containing user information
     * @return boolean (true=success, false=error
     */
    public function update($user)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = " UPDATE users " .
                   "    SET FIRST_NAME = :firstname, " .
                   "        LAST_NAME  = :lastname, " .
                   "        EMAIL      = :email, " .
                   "        MOBILE     = :mobile, " .
                   "        PASSWORD   = :password, " .
                   "        BIRTHDATE  = :bdate_str, " .
                   "        GENDER     = :gender, " .
                   "        ROLE_ID    = :role_id " .
                   "  WHERE ID         = :id";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':firstname', $user->getFirst_name());
            $statement->bindValue(':lastname',  $user->getLast_name());
            $statement->bindValue(':email',     $user->getEmail());
            $statement->bindValue(':mobile',    $user->getMobile());
            $statement->bindValue(':password',  $user->getPassword());
            $statement->bindValue(':bdate_str', $user->getBirthdate());
            $statement->bindValue(':gender',    $user->getGender());
            $statement->bindValue(':role_id',   $user->getRole_id());
            $statement->bindValue(':id',        $user->getId());

            // Execute insert query
            $statement->execute();

        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('../database/database_error.php');
            return false;
        }
        return true;
    }

    /**
     * @param user User - Model containing user information
     * @return boolean (true=success, false=error
     */
    public function create($user)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL, MOBILE, PASSWORD, BIRTHDATE, GENDER, ROLE_ID) " .
                   "VALUES (:firstname, :lastname, :email, :mobile, :password, :bdate_str, :gender, :role_id)";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':firstname', $user->getFirst_name());
            $statement->bindValue(':lastname',  $user->getLast_name());
            $statement->bindValue(':email',     $user->getEmail());
            $statement->bindValue(':mobile',    $user->getMobile());
            $statement->bindValue(':password',  $user->getPassword());
            $statement->bindValue(':bdate_str', $user->getBirthdate());
            $statement->bindValue(':gender',    $user->getGender());
            $statement->bindValue(':role_id',   $user->getRole_id());

            // Execute insert query
            $statement->execute();

        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('../database/database_error.php');
            return false;
        }
        return true;
    }

    public function validateUserLogin($email, $password)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = "SELECT * FROM users WHERE EMAIL = :email AND PASSWORD = :pass";

            $statement = $connection->prepare($sql);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':pass',  $password);

            // Execute query
            $statement->execute();
            $row = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $num_rows = count($row);

            // Determine if login successful
            if ($num_rows === 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('../database/database_error.php');
            return false;
        }
    }

}

