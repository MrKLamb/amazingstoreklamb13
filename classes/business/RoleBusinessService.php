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
 * 3. Role information
 * ---------------------------------------------------------------
 */

class RoleBusinessService
{

    public function __construct()
    {}

    public function getAllRoles()
    {
        $service = new classes\database\RoleDataService();
        return $service->getAllRoles();
    }

    public function getRoleById($id)
    {
        $service = new classes\database\RoleDataService();
        return $service->getRoleById($id);
    }


}

?>
