<?php
namespace classes\utility;
use classes;

require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';
require_once('../../util_funcs.php');


/*
 * ---------------------------------------------------------------
 * Name      : Kelly E. Lamb
 * Date      : 2022-05-12
 * Class     : CST-323 Cloud Computing
 * Professor : Bradley Mauger PhD
 * Assignment: Activity Application
 * Disclaimer: This is my own work test
 * ---------------------------------------------------------------
 * Description:
 * 1. AmazingStore
 * 2. Interceptor Design Pattern - Logging Class
 * 3.
 * ---------------------------------------------------------------
 */

class LogInterceptor extends AbstractInterceptor
{
	function around($object, $method, $args)
	{
		$logger = getLogger();

		$logger->info(basename(get_class($object)) . "::" . "$method" . " Enter.");
		$value = $this->callMethod($method, $args);
		$logger->info(basename(get_class($object)) . "::" . "$method" . " Exit.");
		return $value;
	}
}

?>
