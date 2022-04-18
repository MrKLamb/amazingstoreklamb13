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
 * 3. Credit Card model
 * ---------------------------------------------------------------
 */


class CreditCard
{
    private $name;
    private $number;
    private $expiration;
    private $security;

    public function __construct($name, $number, $expiration, $security)
    {
        $this->name = $name;
        $this->number = $number;
        $this->expiration = $expiration;
        $this->security = $security;

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @return mixed
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param mixed $expiration
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    /**
     * @param mixed $security
     */
    public function setSecurity($security)
    {
        $this->security = $security;
    }
}

