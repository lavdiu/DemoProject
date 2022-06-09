<?php

use Laf\Util\Settings;

if (function_exists('ob_gzhandler'))
		ob_start();
else
	ob_start();
date_default_timezone_set("Europe/Tirane");
session_name("SEEUDemoApp");
session_start();
require_once(__DIR__ . '/functions.php');


/**
 * including autoloaders
 */
require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * this should be included after autoloaders, because it uses Settings class
 */
require_once(__DIR__ . '/database.php');
require_once(__DIR__ . '/constants.php');


/**
 * Setting Global settings
 */
$settings = Settings::getInstance();
$settings->setProperty('debug_level', 0);
