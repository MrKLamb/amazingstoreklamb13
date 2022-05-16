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
 * 1. AmazingStore - Handle Product Search
 * 2. Obtain form data
 * 3. Handle Data / Display
 * ---------------------------------------------------------------
 */

include_once '../../header.php';
include_once '../../securePage.php';
require_once '../../util_funcs.php';

// LOGGER DEFINE in util_funcs - placed in session
$logger = getLogger();
$logger->info(basename(__FILE__, '.php') . "::search: Enter");

// Get criteria from product catalog search
$pattern = filter_input(INPUT_POST, "SearchPattern");

// Create a new busienss service object
$service = new classes\business\ProductBusinessService();
$service = new classes\utility\LogInterceptor($service); // Try Interceptor Logging

// Load data from database for display
$products = $service->searchByProductName($pattern);

saveSearchInfo($products);

// print_r($products);

$logger->info(basename(__FILE__, '.php') . "::search: Exit");

// Redirect to display data
header('Location: ../view/productCatalog.php');

?>