<?php

/**
 * building database connection logic
 */

use Laf\Util\Settings;

$db_host = $db_username = $db_password = $db_name = null;
if(php_sapi_name() == 'cli'){
    $_server_name = 'localhost';
}

if(isset($_SERVER['SERVER_NAME'])){
    $_server_name = $_SERVER['SERVER_NAME'];
}

switch ($_server_name) {
    case "localhost":
    default:
        $db_host = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'demoapp';
        break;
}

/**
 * Database settings
 */
$settings = Settings::getInstance();
$settings->setProperty('database.hostname', $db_host);
$settings->setProperty('database.database_name', $db_name);
$settings->setProperty('database.username', $db_username);
$settings->setProperty('database.password', $db_password);