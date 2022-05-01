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
 * 1. AmazingStoreKLamb13 - Handle Shopping Cart
 * 2. Obtain form data
 * 3. Handle Data / Display
 * ---------------------------------------------------------------
 */

include_once '../../header.php';
include_once '../../securePage.php';
require_once '../../util_funcs.php';

// Get criteria from product catalog search
$product_id = filter_input(INPUT_POST, "ProductID");
$mode = filter_input(INPUT_POST, "Mode");
$qty = filter_input(INPUT_POST, "Qty");

// Get service and user id
$service = new classes\business\ShoppingCartBusinessService();
$user_info = getUserInfo();
$user_id = $user_info[0]["ID"];

if ($mode == 0) // Create Shopping Cart Item
{
    $service->addToCart($user_id, $product_id, $qty);

    // Redirect to display data
    header('Location: ../view/productCatalog.php');
}
else if ($mode == 1) // Update Shopping Cart Item
{
    $service->updateProductQty($user_id, $product_id, $qty);
    // Redirect to display data
    header('Location: ../view/shopping_cart.php');
}
else if ($mode == 2) // Delete Shopping Cart Item
{
    $service->updateProductQty($user_id, $product_id, 0); // Qty =0 equals remove item
    // Redirect to display data
    header('Location: ../view/shopping_cart.php');
}


?>