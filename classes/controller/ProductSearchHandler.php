<?php
namespace classes\controller;
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
 * 1. AmazingStoreKLamb13 - Handle Product Search
 * 2. Obtain form data
 * 3. Handle Data / Display
 * ---------------------------------------------------------------
 */

include_once '../../header.php';
include_once '../../securePage.php';
require_once '../../util_funcs.php';

// Get criteria from product catalog search
$pattern = filter_input(INPUT_POST, "SearchPattern");

// Create a new busienss service object
$service = new classes\business\ProductBusinessService();

// Load data from database for display
$products = $service->searchByProductName($pattern);

saveSearchInfo($products);

// print_r($products);

// Redirect to display data
header('Location: ../view/productCatalog.php');

?>