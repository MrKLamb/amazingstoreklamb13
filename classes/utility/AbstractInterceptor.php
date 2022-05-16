<?php
namespace classes\utility;
use classes;

require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';

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
 * 2. Interceptor Design Pattern - Abstract Class
 * 3.
 * ---------------------------------------------------------------
 */

class AbstractInterceptor
{
	public $_object;
	public $_rootObject;

	public function __construct($object)
	{
		$this->_object = $object;

		if (is_a($object, "AbstractInterceptor"))
			$this->_rootObject = $object->_rootObject;
		else
			$this->_rootObject = $object;

		$object->intercepted = $this;
	}

	public function callMethod($method, $args)
	{
		return call_user_func_array(array($this->_object, $method), $args);
	}

	public function __isset($name)
	{
		return isset($this->_rootObject->$name);
	}

	public function __unset($name)
	{
		unset($this->_rootObject->$name);
	}

	public function __set($name, $value)
	{
		$this->_rootObject->$name = $value;
	}

	public function __get($name)
	{
		return $this->_rootObject->$name;
	}

	public function __call($method, $args)
	{
		if ($method[0] == "_")
			$method = substr($method, 1);

		if (method_exists($this, "before"))
			$this->before($this->_rootObject, $method, $args);

		if (method_exists($this, "around"))
			$value = $this->around($this->_rootObject, $method, $args);
		else
			$value = $this->callMethod($method, $args);

		if (method_exists($this, "after"))
			$this->after($this->_rootObject, $method, $args);

		return $value;
	}
}

?>