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
 * 3. Sales Report information
 * ---------------------------------------------------------------
 */

class SalesReportDataService
{

    public function __construct()
    {}

    // Return an array containing results of report
    // Params - date range start, end
    public function getProductSalesReportByDateRange($start_date, $end_date)
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT CONCAT(users.FIRST_NAME, ' ', users.LAST_NAME) AS NAME, " .
               "       CONCAT(addresses.STREET, ' ', addresses.CITY, ', ', addresses.STATE, ' ', addresses.POSTAL) AS ADDRESS, " .
               "       orders.DATE, " .
               "       products.NAME AS PRODUCT_NAME, " .
               "       order_details.PRICE, " .
               "       order_details.QTY, " .
               "       order_details.EXTENDED_COST " .
               "  FROM order_details " .
               "  JOIN orders ON order_details.ORDER_ID = orders.ID " .
               "  JOIN addresses ON orders.SHIPPING_ADDRESS_ID = addresses.ID " .
               "  JOIN users ON orders.USER_ID = users.ID " .
               "  JOIN products ON order_details.PRODUCT_ID = products.ID " .
               " WHERE addresses.ADDRESS_TYPE = 2 " .
               "   AND orders.DATE BETWEEN :start_date AND :end_date  " .
               " ORDER BY order_details.QTY DESC ";

        $statement = $connection->prepare($sql);
        $statement->bindValue(':start_date', $start_date);
        $statement->bindValue(':end_date',   $end_date);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        // add records to report array
        $report = array();
        $index = 0;
        while ($row = $statement->fetch())
        {
            $report[$index] = array($row["NAME"],
                                    $row["ADDRESS"],
                                    $row["DATE"],
                                    $row["PRODUCT_NAME"],
                                    $row["PRICE"],
                                    $row["QTY"],
                                    $row["EXTENDED_COST"] );
            ++$index;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return $report;
    }
}

