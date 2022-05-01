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
* 1. Create Product Handler (ProductCreateHandler.php)
* 2. Retrieves fields from createProduct.php
* 3. Stores in database
* ---------------------------------------------------------------
*/

require_once('../../util_funcs.php');

// store registration parameters
$product_id  = filter_input(INPUT_POST,'ProductID');
$scancode    = filter_input(INPUT_POST,'ScanCode');
$name        = filter_input(INPUT_POST,'Name');
$description = filter_input(INPUT_POST,'Description');
$price       = filter_input(INPUT_POST,'Price');
$deleted_flag = 0; // Not deleted

$image_array = array();
$index = 0;

// Gather data for images to delete
if (isset($_POST['image']))
{
    foreach ($_POST['image'] as $image)
    {
        $image_info = explode(":", $image);

        $action = "DELETE";
        $image_description = "";
        $image_id = $image_info[0];
        $filename = $image_info[1];
        $tempfile= "";
        $product_image = new classes\model\ProductImage($image_id, $product_id, $action, $filename, $tempfile, $image_description);

        $image_array[$index] = $product_image;
        ++$index;
    }
}

// Gather data for images to create
foreach ($_FILES['files']['tmp_name'] as $key => $value)
{
    $tempfile = $_FILES['files']['tmp_name'][$key];
    $filename = $_FILES['files']['name'][$key];

    if (! empty($filename))
    {
        $action = "CREATE";
        $image_description = "A picture of the product " . $name . " named " . $filename . ".";
        $product_image = new classes\model\ProductImage(0, 0, $action, $filename, $tempfile, $image_description);

        $image_array[$index] = $product_image;
        ++$index;
    }
}

// Instantiate object and service and send product to update
$product = new classes\model\Product($product_id, $scancode, $name, $description, $price, $image_array, $deleted_flag);

// echo "<pre>\n";
// print_r($product);
// echo "</pre>\n";

// exit();

$service = new classes\business\ProductBusinessService();
$result = $service->updateProduct($product);

if (! $result)
{
    print_r($product);
    $error_message = "Update Product Failed - Contact Administrator";
    include('../database/database_error.php');
    exit();
}

header('Location: ../view/admin_edit_product.php');

?>
