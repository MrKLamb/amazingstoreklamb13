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
 * 3. Shopping Cart information
 * ---------------------------------------------------------------
 */

class ShoppingCartDataService
{

    public function __construct()
    {}

    // Returns an array of ShoppingCart objects for the specified user
    public function getCart($user_id)
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT s.*, p.SCANCODE, p.NAME, p.DESCRIPTION, p.PRICE " .
               "  FROM shopping_cart s, products p " .
               " WHERE s.USER_ID = :user_id " .
               "   AND s.PRODUCT_ID = p.ID " .
               " ORDER BY s.PRODUCT_ID ASC";

        $statement = $connection->prepare($sql);
        $statement->bindValue(':user_id', $user_id);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        // add records to users array
        $cartList = array();
        $index = 0;
        while ($row = $statement->fetch())
        {
            $cart = new classes\model\ShoppingCart($row["ID"],
                                                   $row["USER_ID"],
                                                   $row["PRODUCT_ID"],
                                                   $row["QTY"],
                                                   $row["SCANCODE"],
                                                   $row["NAME"],
                                                   $row["DESCRIPTION"],
                                                   $row["PRICE"]
                );

            $cartList[$index] = $cart;
            ++$index;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return $cartList;
    }

    public function create($user_id, $product_id, $qty)
    {
        // If product does not already exist, insert otherwise, update
        $cart = $this->isProductInCart($user_id, $product_id);

        if (is_null($cart))
        {
            try
            {
                // Get Database Connection
                $database = new Database();
                $connection = $database->getConnect();

                // Define SQL prepare statement and bind values
                $sql = "INSERT INTO shopping_cart (USER_ID, PRODUCT_ID, QTY) " .
                       "VALUES (:user_id, :product_id, :qty)";
                $statement = $connection->prepare($sql);

                $statement->bindValue(':user_id',    $user_id);
                $statement->bindValue(':product_id', $product_id);
                $statement->bindValue(':qty',        $qty);

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
        else
        {
            echo "IN UPDATE<br>";
            $new_qty = $qty + $cart->getQty();

            echo "new qty=" . $new_qty . " qty =" . $qty . "<br>";

            print_r($cart);
            return $this->update($user_id, $product_id, $new_qty );
        }
    }

    public function update($user_id, $product_id, $new_qty)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = " UPDATE shopping_cart " .
                   "    SET QTY = :qty " .
                   "  WHERE USER_ID  = :user_id " .
                   "    AND PRODUCT_ID = :product_id";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':qty',        $new_qty);
            $statement->bindValue(':user_id',    $user_id);
            $statement->bindValue(':product_id', $product_id);

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

    public function deleteProduct($user_id, $product_id)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = " DELETE FROM shopping_cart " .
                   "  WHERE USER_ID = :user_id " .
                   "    AND PRODUCT_ID = :product_id";

            $statement = $connection->prepare($sql);
            $statement->bindValue(':user_id',     $user_id);
            $statement->bindValue(':product_id',  $product_id);

            // Execute delete statement
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

    public function deleteCart($user_id)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = " DELETE FROM shopping_cart " .
                   "  WHERE USER_ID = :user_id";

            $statement = $connection->prepare($sql);
            $statement->bindValue(':user_id',  $user_id);

            // Execute delete statement
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

    // Utility to determine if product is already in cart - return cart if exists, otherwise null
    public function isProductInCart($user_id, $product_id)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = "SELECT s.*, p.SCANCODE, p.NAME, p.DESCRIPTION, p.PRICE " .
                   "  FROM shopping_cart s, products p " .
                   " WHERE s.USER_ID = :user_id " .
                   "   AND s.PRODUCT_ID = :product_id " .
                   "   AND s.PRODUCT_ID = p.ID ";

            $statement = $connection->prepare($sql);
            $statement->bindValue(':user_id',     $user_id);
            $statement->bindValue(':product_id',  $product_id);

            // Execute query
            $statement->execute();
            $row = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $num_rows = count($row);

            print_r($row);

            // Determine if it exists
            if ($num_rows >= 1)
            {
                $cart = new classes\model\ShoppingCart($row[0]["ID"],
                                                       $row[0]["USER_ID"],
                                                       $row[0]["PRODUCT_ID"],
                                                       $row[0]["QTY"],
                                                       $row[0]["SCANCODE"],
                                                       $row[0]["NAME"],
                                                       $row[0]["DESCRIPTION"],
                                                       $row[0]["PRICE"] );
                print_r($cart);
                return $cart;
            }
            else
            {
                return null;
            }
        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('../database/database_error.php');
            return false;
        }

    }

}

