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
 * 1. Page Level Security
 * 2. Validate login and/or redirect to login form
 * 3.
 * ---------------------------------------------------------------
 */

include 'header.php';

$test = $_SESSION["principle"];

if (is_null($test) || empty($test) || $test == false)
{
    header("Location: login.php");
}

?>
