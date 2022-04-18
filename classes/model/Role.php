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
 * 3. Role model
 * ---------------------------------------------------------------
 */

class Role
{
    private $id;
    private $rolename;
    private $description;

     public function __construct($id, $rolename, $description)
    {
        $this->id = $id;
        $this->rolename = $rolename;
        $this->description = $description;
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
    public function getRolename()
    {
        return $this->rolename;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $rolename
     */
    public function setRolename($rolename)
    {
        $this->rolename = $rolename;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}

?>


