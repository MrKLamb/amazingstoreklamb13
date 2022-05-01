<?php
namespace classes\controller;
use classes;

require_once '../..' . '/AutoLoader.php';
include_once '../../header.php';
include_once '../../securePage.php';
require_once '../../util_funcs.php';

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
 * 1. Check Out Handler (CheckOutHandler.php)
 * 2. Retrieves fields from check_out.php
 * 3. Stores in database
 * ---------------------------------------------------------------
 */

// store registration parameters
$shipStreet = filter_input(INPUT_POST,'S_Street');
$shipCity   = filter_input(INPUT_POST,'S_City');
$shipState  = filter_input(INPUT_POST,'S_State');
$shipPostal = filter_input(INPUT_POST,'S_Postal');

$billStreet = filter_input(INPUT_POST,'B_Street');
$billCity   = filter_input(INPUT_POST,'B_City');
$billState  = filter_input(INPUT_POST,'B_State');
$billPostal = filter_input(INPUT_POST,'B_Postal');

$ccName     = filter_input(INPUT_POST,'CC_Name');
$ccNumber   = filter_input(INPUT_POST,'CC_Number');
$ccExpiry   = filter_input(INPUT_POST,'CC_Expiration');
$ccSecurity = filter_input(INPUT_POST,'CC_Security');

// Get Logged in user information
$user_info = getUserInfo();
$user_id = $user_info[0]["ID"];

$billAddress = new classes\model\Address(0, $user_id, 1, $billStreet, $billCity, $billState, $billPostal);
$shipAddress = new classes\model\Address(0, $user_id, 2, $shipStreet, $shipCity, $shipState, $shipPostal);
$creditCard = new classes\model\CreditCard($ccName, $ccNumber, $ccExpiry, $ccSecurity);

$cartService = new classes\business\ShoppingCartBusinessService();
$cart_list = $cartService->getCart($user_id);
$cart_cost = $cartService->getCartTotalCost($user_id);

$orderService = new classes\business\OrderBusinessService();
$order_id = $orderService->createOrder($user_id, $shipAddress, $billAddress, $cart_list, $cart_cost, $creditCard);

if ($order_id > 0)
{
    include ('../view/order_confirmation.php');
}
else
{
    echo "Error occurred. Try again or contact administration<br>\n";
    header('Location: ../view/check_out.php');
}
?>
