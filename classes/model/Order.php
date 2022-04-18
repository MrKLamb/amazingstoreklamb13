<?php
namespace classes\model;
require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';

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
 * 3. Order model
 * ---------------------------------------------------------------
 */

class Order
{
    private $id;
    private $date;
    private $user_id;
    private $billing_address_id;
    private $shipping_address_id;
    private $total_cost;

    public function __construct($id, $date, $user_id, $billing_address_id, $shipping_address_id, $total_cost)
    {
        $this->id = $id;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->billing_address_id = $billing_address_id;
        $this->shipping_address_id = $shipping_address_id;
        $this->total_cost = $total_cost;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getBilling_address_id()
    {
        return $this->billing_address_id;
    }

    /**
     * @return mixed
     */
    public function getShipping_address_id()
    {
        return $this->shipping_address_id;
    }

    /**
     * @return mixed
     */
    public function getTotal_cost()
    {
        return $this->total_cost;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $billing_address_id
     */
    public function setBilling_address_id($billing_address_id)
    {
        $this->billing_address_id = $billing_address_id;
    }

    /**
     * @param mixed $shipping_address_id
     */
    public function setShipping_address_id($shipping_address_id)
    {
        $this->shipping_address_id = $shipping_address_id;
    }

    /**
     * @param mixed $total_cost
     */
    public function setTotal_cost($total_cost)
    {
        $this->total_cost = $total_cost;
    }
}

