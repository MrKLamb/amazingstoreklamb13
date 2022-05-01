<?php
namespace classes\business;
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
 * 1. AmazingStoreKLamb13
 * 2. Business Layer
 * 3. Shopping Cart Information
 * ---------------------------------------------------------------
 */

class ShoppingCartBusinessService
{

    public function __construct()
    {}

    // Return an array of ShoppingCart objects
    public function getCart($user_id)
    {
        $service = new classes\database\ShoppingCartDataService();
        return $service->getCart($user_id);
    }

    public function getCartTotalCost($user_id)
    {
        $list = $this->getCart($user_id);

        $total = 0.00;

        foreach($list as $item)
        {
            $total = $total + $item->getExtended_cost();
        }
        return $total;
    }

    // Add product and qty to cart - if already exists, update qty
    public function addToCart($user_id, $product_id, $qty)
    {
        $service = new classes\database\ShoppingCartDataService();
        return $service->create($user_id, $product_id, $qty);
    }

    public function updateProductQty($user_id, $product_id, $new_qty)
    {
        $service = new classes\database\ShoppingCartDataService();

        if ($new_qty <= 0)
        {
            return $service->deleteProduct($user_id, $product_id);
        }
        else
        {
            return $service->update($user_id, $product_id, $new_qty);
        }
    }

    public function clearCart($user_id)
    {
        $service = new classes\database\ShoppingCartDataService();
        return $service->deleteCart($user_id);
    }

}

