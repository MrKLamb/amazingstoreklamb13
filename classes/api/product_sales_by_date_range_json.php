<?php
namespace classes\api;
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
 * 2. Obtain report information
 * 3. api - json product sales report by date range
 * ---------------------------------------------------------------
 */

// Get criteria from product catalog search
$start_date = filter_input(INPUT_GET, "startDate");
$end_date = filter_input(INPUT_GET, "endDate");

// Create a new busienss service object
$service = new classes\business\SalesReportBusinessService();

// Load data from database for display
$report = $service->getProductSalesReportByDateRange($start_date, $end_date);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($report);

?>
