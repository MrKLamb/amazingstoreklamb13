<?php
namespace classes\business;
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
 * 2. Business Layer
 * 3. Sales Report Information
 * ---------------------------------------------------------------
 */

class SalesReportBusinessService
{

    public function __construct()
    {}

    // Return an array containing results of report
    // Params - date range start, end
    public function getProductSalesReportByDateRange($start_date, $end_date)
    {
        $service = new classes\database\SalesReportDataService();
        return $service->getProductSalesReportByDateRange($start_date, $end_date);
    }
}

