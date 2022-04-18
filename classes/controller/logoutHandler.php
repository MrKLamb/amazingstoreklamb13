<?php
namespace classes\controller;
require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';

session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

/* This will give an error. Note the output
 * above, which is before the header() call */
header('Location: ../../index.php');

?>