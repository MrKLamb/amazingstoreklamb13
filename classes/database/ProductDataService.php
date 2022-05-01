<?php
namespace classes\database;
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
 * 2. Database Layer
 * 3. Product information
 * ---------------------------------------------------------------
 */

class ProductDataService
{

    public function __construct()
    {}

    public function findByProductName($searchPattern)
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = " SELECT * " .
               "   FROM products " .
               "  WHERE NAME LIKE :searchPattern " .
               "    AND DELETED_FLAG = 0 " .
               "  ORDER BY NAME ASC";
        $statement = $connection->prepare($sql);

        $searchPattern = '%' . $searchPattern . '%';
        $statement->bindValue(':searchPattern', $searchPattern);

        $statement->bindValue(':searchPattern', $searchPattern);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        // Read all users into a 2 dimensional Array where each Row in the Array
        // is a User ID at [0], First Name at [1], and Last Name at [2]
        $products = array();
        $index = 0;
        while ($row = $statement->fetch())
        {
            $image_array = $this->getImagesByProductID($row["ID"]);
            $products[$index] = array($row["ID"],
                                      $row["SCANCODE"],
                                      $row["NAME"],
                                      $row["DESCRIPTION"],
                                      $row["PRICE"],
                                      $image_array,
                                      $row["DELETED_FLAG"]
            );
            ++$index;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        // Return array - even is blank
        return $products;
    }

    function getAllProducts()
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT * " .
               "  FROM products " .
               " WHERE DELETED_FLAG = 0 " .
               " ORDER BY NAME ASC";
        $statement = $connection->prepare($sql);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        // add records to products array
        $products = array();
        $index = 0;
        while ($row = $statement->fetch())
        {
            $image_array = $this->getImagesByProductID($row["ID"]);
            $products[$index] = array($row["ID"],
                                      $row["SCANCODE"],
                                      $row["NAME"],
                                      $row["DESCRIPTION"],
                                      $row["PRICE"],
                                      $image_array,
                                      $row["DELETED_FLAG"]
            );
            ++$index;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        // Return array - even is blank
        return $products;
    }

    /**
     * @param id - integer
     * @return classes\model\Product Model
     */
    public function getProductById($id)
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT * " .
               "  FROM products " .
               " WHERE ID = :id";
        $statement = $connection->prepare($sql);

        $statement->bindValue(':id', $id);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        $row = $statement->fetch();

        $image_array = $this->getImagesByProductID($id);
        $product = new classes\model\Product($row["ID"],
                                             $row["SCANCODE"],
                                             $row["NAME"],
                                             $row["DESCRIPTION"],
                                             $row["PRICE"],
                                             $image_array,
                                             $row["DELETED_FLAG"]);

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return $product;

    }

    public function delete($id)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            // Set deleted flag = 1 (Yes)
            $sql = " UPDATE products " .
                   "    SET DELETED_FLAG = 1 " .
                   "  WHERE ID = :id";

            $statement = $connection->prepare($sql);
            $statement->bindValue(':id',  $id);

            // Execute delete stateent
            $statement->execute();

            // Remove product image links from database
            $this->deleteImagesByProductId($id);

            // Remove product images from file system
            $this->deleteAllImageFiles($id);


        } catch (\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('../database/database_error.php');
            return false;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return true;
    }

    /**
     * @param product Product - Model containing product information
     * @return boolean (true=success, false=error
     */
    public function update($product)
    {
        echo "HERE 0<br>\n";
        try
        {
            // Get Database Connection
            $database = new Database();
            echo "HERE 01<br>\n";
            $connection = $database->getConnect();
            echo "HERE 02<br>\n";

            // Define SQL prepare statement and bind values
            $sql = " UPDATE products " .
                   "    SET SCANCODE     = :scancode, " .
                   "        NAME         = :name, " .
                   "        DESCRIPTION  = :description, " .
                   "        PRICE        = :price, " .
                   "        DELETED_FLAG = :deleted_flag " .
                   "  WHERE ID = :id";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':scancode',     $product->getScanCode());
            $statement->bindValue(':name',         $product->getName());
            $statement->bindValue(':description',  $product->getDescription());
            $statement->bindValue(':price',        $product->getPrice());
            $statement->bindValue(':deleted_flag', $product->getDeleted_flag());
            $statement->bindValue(':id',           $product->getId());

            // Execute insert query
            $statement->execute();

echo "HERE 1<br>\n";

            $product_id = $product->getId();
echo "HERE 2<br>\n";

            // Delete images from database as specified by action
            $this->deleteProductImage($product_id, $product->getImage_array());

            echo "HERE 3<br>\n";



            // Delete images from file system as specified by action
            $this->deleteImageFiles($product_id, $product->getImage_array());

            echo "HERE 4<br>\n";

            // Create images in database as specified by action
            $this->insertProductImage($product_id, $product->getImage_array());

            echo "HERE 5<br>\n";


            // Move temporary images to their corresponding image. item folder
            $this->createImageFiles($product_id, $product->getImage_array());

            echo "HERE 6<br>\n";

        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('../database/database_error.php');
            return false;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return true;
    }

    /**
     * @param product Product - Model containing product information
     * @return boolean (true=success, false=error
     */
    public function create($product)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = "INSERT INTO products (SCANCODE, NAME, DESCRIPTION, PRICE, DELETED_FLAG) " .
                   "VALUES (:scancode, :name, :description, :price, :deleted_flag)";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':scancode',     $product->getScanCode());
            $statement->bindValue(':name',         $product->getName());
            $statement->bindValue(':description',  $product->getDescription());
            $statement->bindValue(':price',        $product->getPrice());
            $statement->bindValue(':deleted_flag', $product->getDeleted_flag());

            // Execute insert query
            $statement->execute();
            $product_id = $connection->lastInsertId();

            // Insert images into product image table
            $this->insertProductImage($product_id, $product->getImage_array());

            // Move temporary images to their corresponding image. item folder
            $this->createImageFiles($product_id, $product->getImage_array());

        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('database_error.php');
            return false;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return true;
    }

    // ---------------------------------------------------------
    // PRODUCT IMAGE SECTION BELOW
    // ---------------------------------------------------------

    public function getImagesByProductID($product_id)
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT * " .
               "  FROM product_images " .
               " WHERE PRODUCT_ID = :product_id " .
               " ORDER BY ID ASC";
        $statement = $connection->prepare($sql);

        $statement->bindValue(':product_id', $product_id);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        // add records to products array
        $images = array();
        $index = 0;
        while ($row = $statement->fetch())
        {
            $image = new classes\model\ProductImage($row["ID"],
                                                    $row["PRODUCT_ID"],
                                                    "", // Action
                                                    $row["FILENAME"],
                                                    "", // Temp File
                                                    $row["DESCRIPTION"]);

            $images[$index] = $image;
            ++$index;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        // Return array - even is blank
        return $images;
    }

    public function getImageById($image_id)
    {
        // Get Database Connection
        $database = new Database();
        $connection = $database->getConnect();

        // Define SQL prepare statement and bind values
        $sql = "SELECT * " .
               "  FROM product_images " .
               " WHERE ID = :id";
        $statement = $connection->prepare($sql);

        $statement->bindValue(':id', $image_id);

        // Execute select query
        $statement->execute();

        // return records as associative array - could use fetchAll
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        $row = $statement->fetch();

        $image = new classes\model\ProductImage($row["ID"],
                                                $row["PRODUCT_ID"],
                                                "", // Action
                                                $row["FILENAME"],
                                                "", // Temp File
                                                $row["DESCRIPTION"]);

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return $image;
    }

    public function updateProductImage($product_image)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // $product_image = new classes\model\ProductImage($id, $product_id, $filename, $description);
            // Define SQL prepare statement and bind values
            $sql = "UPDATE product_images " .
                   "   SET FILENAME = :filename, " .
                   "       DESCRIPTION = :description " .
                   " WHERE ID = :id";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':filename',    $product_image->getFilename());
            $statement->bindValue(':description', $product_image->getDescription());
            $statement->bindValue(':id',          $product_image->getId());

            // Execute update statement
            $statement->execute();

        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('database_error.php');
            return false;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return true;
    }

    public function insertProductImage($product_id, $images_array)
    {
        if (count($images_array) == 0)
        {
            return; // nothing to do
        }

        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = "INSERT INTO product_images (PRODUCT_ID, FILENAME, DESCRIPTION) " .
                   "VALUES (:product_id, :filename, :description)";
            $statement = $connection->prepare($sql);

            foreach ($images_array as $item)
            {
                if ($item->getAction() == "CREATE")
                {
                    $statement->bindValue(':product_id',  $product_id);
                    $statement->bindValue(':filename',    $item->getFilename());
                    $statement->bindValue(':description', $item->getDescription());

                    // Execute insert statement
                    $statement->execute();
                }
            }

        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('database_error.php');
            return false;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return true;
    }

    public function deleteProductImage($product_id, $images_array)
    {
        if (count($images_array) == 0)
        {
            return; // nothing to do
        }

        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = "DELETE FROM product_images " .
                   " WHERE PRODUCT_ID = :product_id " .
                   "   AND ID = :id";
            $statement = $connection->prepare($sql);

            foreach ($images_array as $item)
            {
                if ($item->getAction() == "DELETE")
                {
                    $statement->bindValue(':product_id', $product_id);
                    $statement->bindValue(':id',         $item->getId());

                    // Execute insert statement
                    $statement->execute();
                }
            }

            // Execute delete statement
            $statement->execute();

        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('database_error.php');
            return false;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return true;
    }

    public function deleteImagesByProductId($product_id)
    {
        try
        {
            // Get Database Connection
            $database = new Database();
            $connection = $database->getConnect();

            // Define SQL prepare statement and bind values
            $sql = "DELETE FROM product_images " .
                   " WHERE PRODUCT_ID = :product_id";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':product_id',  $product_id);

            // Execute insert statement
            $statement->execute();

        } catch(\PDOException $e)
        {
            $error_message = $e->getMessage();
            include('database_error.php');
            return false;
        }

        // Close statement and connection
        $statement->closeCursor();
        $statement = null;
        $connection = null;
        $database = null;

        return true;
    }

    public function deleteAllImageFiles($product_id)
    {
        // Delete image item directory and all the content inside

        // Folder path to be flushed
        $folder_path = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "item" . DIRECTORY_SEPARATOR . $product_id;

        // List of name of files inside specified folder
        $files = glob($folder_path . DIRECTORY_SEPARATOR . '*');

        // Deleting all the files in the list
        foreach ($files as $file)
        {
            if (is_file($file))
            {
                unlink($file); // Delete the given file
            }
        }

        // Remove folder
        $result = rmdir($folder_path);
    }

    public function deleteImageFiles($product_id, $images_array)
    {
        if (count($images_array) == 0)
        {
            return; // nothing to do
        }


            // Delete image item directory and all the content inside

        // Folder path to be flushed
        $folder_path = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "item" . DIRECTORY_SEPARATOR . $product_id;

        if (! file_exists($folder_path))
        {
            return; // No folder - no files to delete
        }

        // Deleting the files in the list set for delete
        foreach ($images_array as $i)
        {
            if ($i->getAction() == "DELETE")
            {
                $file = $folder_path . DIRECTORY_SEPARATOR . $i->getFilename();
                if (is_file($file))
                {
                    unlink($file); // Delete the given file
                }
            }
        }
    }

    public function createImageFiles($product_id, $images_array)
    {
        if (count($images_array) == 0)
        {
            return; // nothing to do
        }

        // Folder path to create/store images
        $folder_path = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "item" . DIRECTORY_SEPARATOR . $product_id;

        if (! file_exists($folder_path))
        {
            mkdir($folder_path);
        }

        foreach ($images_array as $i)
        {
            if ($i->getAction() == "CREATE")
            {
                $filepath = $folder_path . DIRECTORY_SEPARATOR . $i->getFilename();
                $tmp_path = $i->getTempfile();
                move_uploaded_file($tmp_path, $filepath);
            }
        }
    }
}

?>

