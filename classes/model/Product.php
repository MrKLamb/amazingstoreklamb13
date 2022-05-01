<?php
namespace classes\model;
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
 * 3. Product mode
 * ---------------------------------------------------------------
 */

class Product
{
    private $id;             // int - unique
    private $scancode;       // string(100) - unique
    private $name;           // string(100)
    private $description;    // string(100) - unique
    private $price;          // float
    private $image_array;    // array of ProductImage
    private $deleted_flag;   // boolean (0=active,1=discontinued/deleted)

    public function __construct($id, $scancode, $name, $description, $price, $image_array, $deleted_flag)
    {
        $this->id = $id;
        $this->scancode = $scancode;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image_array = $image_array;
        $this->deleted_flag = $deleted_flag;
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
    public function getScancode()
    {
        return $this->scancode;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getImage_array()
    {
        return $this->image_array;
    }

    /**
     * @return mixed
     */
    public function getDeleted_flag()
    {
        return $this->deleted_flag;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $scancode
     */
    public function setScancode($scancode)
    {
        $this->scancode = $scancode;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param mixed $image_array
     */
    public function setImage_array($image_array)
    {
        $this->image_array = $image_array;
    }

    /**
     * @param mixed $deleted_flag
     */
    public function setDeleted_flag($deleted_flag)
    {
        $this->deleted_flag = $deleted_flag;
    }
}
?>

