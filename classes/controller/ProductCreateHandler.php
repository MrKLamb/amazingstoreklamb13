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
* 1. Edit Product Handler (ProductEditHandler.php)
* 2. Retrieves fields from _editProduct.php
* 3. Stores in database
* ---------------------------------------------------------------
*/

require_once('../../util_funcs.php');

// store registration parameters
$product_id  = 0;
$scancode    = filter_input(INPUT_POST,'ScanCode');
$name        = filter_input(INPUT_POST,'Name');
$description = filter_input(INPUT_POST,'Description');
$price       = filter_input(INPUT_POST,'Price');
$deleted_flag = 0; // Not deleted

// Loop through each file in files[] array to obtain uploaded image names
// Then, insert in image array to add to the product
$image_array = array();
$index = 0;

foreach ($_FILES['files']['tmp_name'] as $key => $value)
{
    $tempfile = $_FILES['files']['tmp_name'][$key];
    $filename = $_FILES['files']['name'][$key];

    $action = "CREATE";
    $image_description = "A picture of the product " . $name . " named " . $filename . ".";
    $product_image = new classes\model\ProductImage(0, 0, $action, $filename, $tempfile, $image_description);

    $image_array[$index] = $product_image;
    ++$index;
}

// Instantiate object and service and send product to update
$product = new classes\model\Product($product_id, $scancode, $name, $description, $price, $image_array, $deleted_flag);

// Call business service to store / transfer product & image information
$service = new classes\business\ProductBusinessService();
$result = $service->createProduct($product);

if (! $result)
{
    print_r($product);
    $error_message = "Create Product Failed - Contact Administrator";
    include('../database/database_error.php');
    exit();
}

header('Location: ../view/admin_edit_product.php');

?>
