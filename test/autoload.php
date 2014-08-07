<?php
	function __autoload($className)
	{
		include $className . '.php';
	}
?>