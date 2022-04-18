<?php

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
 * 2. Configuration
 * 3. Automatically load dependencies
 * ---------------------------------------------------------------
 */

spl_autoload_register(function($className) {

      //  echo "INSIDE AutoLoader - Step 1<br />\r\n";
      //  echo __DIR__ . DIRECTORY_SEPARATOR . $className . "<br />\r\n";

    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    // include_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $className . '.php';

});

?>
