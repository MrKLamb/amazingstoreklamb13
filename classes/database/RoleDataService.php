<?php
namespace classes\database;
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
 * 1. AmazingStoreKLamb13
 * 2. Database Layer
 * 3. Role information
 * ---------------------------------------------------------------
 */

/**
 * @author Kelly Lamb
 *
 */
class RoleDataService
{

    public function __construct()
    {}

    public function getAllRoles()
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT * FROM roles ORDER BY ID";
        $statement = $connection->prepare($sql);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $roles = $statement->fetchAll(\PDO::FETCH_ASSOC);

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return $roles;
    }

    /**
     * @param id - int containing id for role information
     * @return classes\model\Role Model
     */
    public function getRoleById($id)
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT r.* " .
               "  FROM roles r " .
               " WHERE r.ID = :id";
        $statement = $connection->prepare($sql);

        $statement->bindValue(':id', $id);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        $row = $statement->fetch();

        $role = new classes\model\Role($row["ID"],
                                       $row["ROLENAME"],
                                       $row["DESCRIPTION"]);

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return $role;

    }

}

