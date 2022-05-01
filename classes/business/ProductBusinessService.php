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
 * 3. Product information
 * ---------------------------------------------------------------
 */

class ProductBusinessService
{

    public function __construct()
    {}

    public function searchByProductName($pattern)
    {
        $service = new classes\database\ProductDataService();
        return $service->findByProductName($pattern);
    }

    public function getAllProducts()
    {
        $service = new classes\database\ProductDataService();
        return $service->getAllProducts();
    }

    public function getProductById($id)
    {
        $service = new classes\database\ProductDataService();
        return $service->getProductById($id);
    }

    public function deleteProductById($id)
    {
        $service = new classes\database\ProductDataService();
        return $service->delete($id);
    }

    public function updateProduct($product)
    {
        echo "HERE AA<br>\n";
        $service = new classes\database\ProductDataService();
        return $service->update($product);
    }

    public function createProduct($product)
    {
        $service = new classes\database\ProductDataService();
        return $service->create($product);
    }

}

?>

