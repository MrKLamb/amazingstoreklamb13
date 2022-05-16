<?php
namespace classes\controller;
use classes;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once '../..' . '/AutoLoader.php';
require '../..' . '/vendor/autoload.php';
require_once('../../util_funcs.php');

// LOGGER DEFINE in util_funcs - placed in session
$logger = getLogger();
$logger->info(basename(__FILE__, '.php') . "::logout: Enter");
$logger->info(basename(__FILE__, '.php') . "::logout: Exit");


session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

/* This will give an error. Note the output
 * above, which is before the header() call */
header('Location: ../../index.php');

?>