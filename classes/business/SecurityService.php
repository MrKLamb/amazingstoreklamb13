<?php
namespace classes\business;
use classes;

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
 * 1. Security Service
 * 2. Validate User Login
 * 3. Handle Login Validation
 * ---------------------------------------------------------------
 */

class SecurityService
{
    public function authenticate($email, $password)
    {
        $service = new classes\database\UserDataService();
        return $service->validateUserLogin($email, $password);
    }
}

