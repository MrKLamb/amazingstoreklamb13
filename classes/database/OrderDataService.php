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
 * 3. Order information
 * ---------------------------------------------------------------
 */

class OrderDataService
{

    public function __construct()
    {}

    public function create($user_id, $shipAddress, $billAddress, $cart_list, $cart_cost)
    {
        try
        {
            // Get Database Connection and begin a transaction
            $database = new Database();
            $connection = $database->getConnect();
            $connection->beginTransaction();

            // ---------------------------------------------------------------
            // INSERT BILLING ADDRESS
            // ---------------------------------------------------------------
            $sql = "INSERT INTO addresses (USER_ID, ADDRESS_TYPE, STREET, CITY, STATE, POSTAL) " .
                   "VALUES (:user_id, :address_type, :street, :city, :state, :postal)";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':user_id',      $user_id);
            $statement->bindValue(':address_type', $billAddress->getAddress_type());
            $statement->bindValue(':street',       $billAddress->getStreet());
            $statement->bindValue(':city',         $billAddress->getCity());
            $statement->bindValue(':state',        $billAddress->getState());
            $statement->bindValue(':postal',       $billAddress->getPostal());

            // Execute insert query
            $statement->execute();
            $billing_id = $connection->lastInsertId();


            // ---------------------------------------------------------------
            // INSERT SHIPPPING ADDRESS
            // ---------------------------------------------------------------
            $sql = "INSERT INTO addresses (USER_ID, ADDRESS_TYPE, STREET, CITY, STATE, POSTAL) " .
                   "VALUES (:user_id, :address_type, :street, :city, :state, :postal)";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':user_id',      $user_id);
            $statement->bindValue(':address_type', $shipAddress->getAddress_type());
            $statement->bindValue(':street',       $shipAddress->getStreet());
            $statement->bindValue(':city',         $shipAddress->getCity());
            $statement->bindValue(':state',        $shipAddress->getState());
            $statement->bindValue(':postal',       $shipAddress->getPostal());

            // Execute insert query
            $statement->execute();
            $shipping_id = $connection->lastInsertId();


            // ---------------------------------------------------------------
            // INSERT ORDER
            // ---------------------------------------------------------------
            $sql = "INSERT INTO orders (DATE, USER_ID, BILLING_ADDRESS_ID, SHIPPING_ADDRESS_ID, TOTAL_COST) " .
                   "VALUES (:date, :user_id, :billing_id, :shipping_id, :total_cost)";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':date',        date("Y-m-d"));
            $statement->bindValue(':user_id',     $user_id);
            $statement->bindValue(':billing_id',  $billing_id);
            $statement->bindValue(':shipping_id', $shipping_id);
            $statement->bindValue(':total_cost',  $cart_cost);

            // Execute insert query
            $statement->execute();
            $order_id = $connection->lastInsertId();

            // ---------------------------------------------------------------
            // INSERT ORDER DETAILS
            // ---------------------------------------------------------------
            $sql = "INSERT INTO order_details (ORDER_ID, PRODUCT_ID, PRICE, QTY, EXTENDED_COST) " .
                   "VALUES (:order_id, :product_id, :price, :qty, :extended_cost)";
            $statement = $connection->prepare($sql);

            // Loop over cart list and insert items - assume array processing would be faster
            foreach ($cart_list as $item)
            {
                $statement->bindValue(':order_id',      $order_id);
                $statement->bindValue(':product_id',    $item->getProduct_id());
                $statement->bindValue(':price',         $item->getPrice());
                $statement->bindValue(':qty',           $item->getQty());
                $statement->bindValue(':extended_cost', $item->getExtended_cost());

                // Execute insert query
                $statement->execute();
            }


            // ---------------------------------------------------------------
            // INSERT ORDER HISTORY
            // ---------------------------------------------------------------
            $sql = "INSERT INTO order_history (EVENTTYPE, ORDER_ID) " .
                   "VALUES (:event_type, :order_id)";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':event_type', 0); // Received
            $statement->bindValue(':order_id',   $order_id);

            // Execute insert query
            $statement->execute();


            // ---------------------------------------------------------------
            // DELETE SHOPPING CART
            // ---------------------------------------------------------------
            $sql = "DELETE FROM shopping_cart WHERE USER_ID = :user_id";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':user_id', $user_id);

            // Execute delete query
            $statement->execute();


            // ---------------------------------------------------------------
            // COMMIT - AT THIS POINT ALL ENTITIES SAVED SUCCESSFULLY
            // ---------------------------------------------------------------
            $connection->commit();

        } catch(\PDOException $e)
        {
            // ---------------------------------------------------------------
            // ROLLBACK - SOME ERROR OCCURRED - ACID = All or nothing approach
            // ---------------------------------------------------------------
            $connection->rollBack();

            $error_message = $e->getMessage();
            include('../database/database_error.php');
            return 0;
        }

        // Release resources
        $connection = null;
        $database = null;

        return $order_id;
    }
}

