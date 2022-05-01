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
 * 3. User model
 * ---------------------------------------------------------------
 */

class User
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $mobile;
    private $password;
    private $birthdate;
    private $gender;
    private $role_id;

    public function __construct($id, $first_name, $last_name, $email, $mobile, $password, $birthdate, $gender, $role_id)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->mobile =$mobile;
        $this->password = $password;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
        $this->role_id = $role_id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @return boolean
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return int
     */
    public function getRole_id()
    {
        return $this->role_id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $first_name
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param string $last_name
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param \DateTime $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @param boolean $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @param int $role_id
     */
    public function setRole_id($role_id)
    {
        $this->role_id = $role_id;
    }

}

