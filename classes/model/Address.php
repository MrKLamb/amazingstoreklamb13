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
 * 3. Address model
 * ---------------------------------------------------------------
 */


class Address
{
    private $id;
    private $user_id;
    private $address_type;
    private $street;
    private $city;
    private $state;
    private $postal;

    public function __construct($id, $user_id, $address_type, $street, $city, $state, $postal)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->address_type = $address_type;
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->postal = $postal;
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
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getAddress_type()
    {
        return $this->address_type;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $address_type
     */
    public function setAddress_type($address_type)
    {
        $this->address_type = $address_type;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param mixed $postal
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;
    }
}

