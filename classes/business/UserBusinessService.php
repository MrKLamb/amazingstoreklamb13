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
 * 3. User information
 * ---------------------------------------------------------------
 */

class UserBusinessService
{

    public function __construct()
    {}

    public function searchByFirstName($pattern)
    {
        $service = new classes\database\UserDataService();
        return $service->findByFirstName($pattern);
    }

    public function getAllUsers()
    {
        $service = new classes\database\UserDataService();
        return $service->getAllUsers();
    }

    public function getUserById($id)
    {
        $service = new classes\database\UserDataService();
        return $service->getUserById($id);
    }

    public function deleteUserById($id)
    {
        $service = new classes\database\UserDataService();
        return $service->delete($id);
    }

    public function updateUser($user)
    {
        $service = new classes\database\UserDataService();
        return $service->update($user);
    }

    public function createUser($user)
    {
        $service = new classes\database\UserDataService();
        return $service->create($user);
    }

}

