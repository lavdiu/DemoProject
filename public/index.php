<?php

use Lavdiu\DemoApp\App;

require_once(__DIR__ . '/../app/config/config.php');

try {
	App::bootstrap();
} catch (Exception $e) {
	echo "An unexpected error has occurred. Please try again later.<br />" . $e->getMessage();
	/**
	 * @TODO
	 * if it's dev, show the error message
	 * create a table to store exceptions and report them
	 */
}
