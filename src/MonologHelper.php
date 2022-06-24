<?php

namespace Lavdiu\DemoApp;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MonologHelper
{
    const INFO = Logger::INFO;
    const DEBUG = Logger::DEBUG;


    /**
     * @param int $level
     * @return Logger
     * @throws \Exception
     */
    public static function getPhpOutputLogger(int $level = 100): Logger
    {
        $log = new Logger('Default logger');
        $log->pushHandler(new StreamHandler('php://output', $level));
        return $log;
    }

    /**
     * @param string $file
     * @param int $level
     * @return Logger
     * @throws \Exception
     */
    public static function getLoggerToFile(string $file, int $level = 200)
    {
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler($file, $level));
        return $log;

    }

}