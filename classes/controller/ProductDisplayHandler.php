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
* 1. Display Product Handler (ProductDiplayHandler.php)
* 2. Retrieves fields from _displayAllProducts.php, calls _displayProduct.php
* 3. Stores in database
* ---------------------------------------------------------------
*/

require_once('../../util_funcs.php');

// store registration parameters
$product_id = filter_input(INPUT_GET,'id');

$ps = new classes\business\ProductBusinessService();
$product = $ps->getProductById($product_id);

include('../view/_displayProduct.php');

?>
