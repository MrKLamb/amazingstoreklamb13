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
* 1. Delete Product Handler (ProductDeleteHandler.php)
* 2. Retrieves fields from _deleteProduct.php
* 3. Stores in database
* ---------------------------------------------------------------
*/

require_once('../../util_funcs.php');

// store registration parameters
$product_id  = filter_input(INPUT_POST,'ProductID');
// $scancode    = filter_input(INPUT_POST,'ScanCode');
// $name        = filter_input(INPUT_POST,'Name');
// $description = filter_input(INPUT_POST,'Description');
// $price       = filter_input(INPUT_POST,'Price');

$service = new classes\business\ProductBusinessService();
$result = $service->deleteProductById($product_id);

if (! $result)
{
    $error_message = "Delete Product Failed - Contact Administrator";
    include('../database/database_error.php');
    exit();
}


header('Location: ../view/admin_edit_product.php');


?>
