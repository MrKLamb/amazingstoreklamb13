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
 * 3. Order Information
 * ---------------------------------------------------------------
 */

class OrderBusinessService
{

    public function __construct()
    {}

    public function validateCreditCard($credit_card)
    {
        return true; // This would simulate validating/charging credit card
    }

    // Check Out Process - Create database entries for all required entities
    public function createOrder($user_id, $shipAddress, $billAddress, $cart_list, $cart_cost, $credit_card)
    {
        $card_ok = $this->validateCreditCard($credit_card);
        if ($card_ok) // Good to process order.
        {
            $service = new classes\database\OrderDataService();
            return $service->create($user_id, $shipAddress, $billAddress, $cart_list, $cart_cost);
        }
        else
        {
            return 0; // credit card not acceptable
        }
    }

}

