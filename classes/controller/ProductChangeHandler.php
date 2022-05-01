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
 * 1. AmazingStoreKLamb13 - Handle Post Edit / Delete Requests
 * 2. Obtain form data
 * 3. Handle Login Validation
 * ---------------------------------------------------------------
 */

require_once('../../util_funcs.php');

// store registration parameters
$product_id = filter_input(INPUT_GET,'id');
$mode       = filter_input(INPUT_GET,'mode'); // 0 - Edit, 1 - Delete

// Validate mode operations
if ( ($mode < 0) || ($mode > 1) )
{
    echo "Invalid Request Operation - Contact Administrator.<br />";
    exit();
}

$ps = new classes\business\ProductBusinessService();
$product = $ps->getProductById($product_id);

if ($mode == 0)
{
    include('../view/_editProduct.php');
}
else
{
    include('../view/_deleteProduct.php');
}
?>