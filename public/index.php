<?php

use Laf\Database\Db;
use Lavdiu\DemoApp\App;
use Lavdiu\DemoApp\Factory;
use Lavdiu\DemoApp\LoginErrorException;
use Lavdiu\DemoApp\NoFailureException;
use Lavdiu\DemoApp\SqlError;

require_once(__DIR__ . '/../app/config/config.php');


try {
    $db = Db::getInstance();
    $db->setSqlErrorLogger(new SqlError());

    App::bootstrap();
} catch (LoginErrorException|NoFailureException $e) {
    echo Factory::getFatalErrorMessageCard($e);
    exit;
} catch (Throwable $e) {
    echo Factory::getFatalErrorMessageCard($e);
    #if (!isDev()) {
    #Email::sendAsmErrorMessage($e);
    #}
    exit;
}
