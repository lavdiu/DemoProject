<?php

spl_autoload_register('Lavdiu\DemoAppAutoloader');

function Lavdiu\DemoAppAutoloader($className)
{
	$file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	$file = __DIR__ . '/../' . $file . '.php';
	#echo "trying to include Class: {$className}; file: {$file}\n<br />";
	if (file_exists($file) && is_readable($file)) {
		require_once $file;
	}
}