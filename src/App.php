<?php

namespace Lavdiu\DemoApp;

use Lavdiu\DemoApp\RoutingTable;
use Laf\Util\Settings;
use Laf\Util\UrlParser;

class App
{
    /**
     * @throws \Exception
     */
    public static function bootstrap()
    {

        $settings = Settings::getInstance();

        $rt = new RoutingTable();
        $module = UrlParser::getModule();

        /**
         * Find by routing_table id
         */
        if (is_numeric($module)) {
            $rt = RoutingTable::findOne([
                'id' => $module
            ]);
        } else if (mb_strlen($module) > 2) { #Find by routing_table unique_name
            $rt = $rt->findOne([
                'unique_name' => $module
            ]);
        } else { #find_default
            $rt = $rt->findOne([
                'is_default' => 1
            ]);
        }

        if (!$rt) {
            throw new \Exception('No Routing Entry found');
        }

        if ($rt->getRequiresLoginVal() != "0") {
            if (!Person::isLoggedIn()) {
                header('location:' . $settings->getProperty('login_url'));
                exit;
            }
        }

        if ($rt->recordExists()) {
            if (mb_strlen($rt->getPageFileVal() ?? '') < 1) {
                throw new \Exception("Menu entry is missing a page file location");
            }

            $pageFile = __DIR__ . '/../app/view/' . $rt->getPageFileVal();
            if (file_exists($pageFile)) {
                include_once($pageFile);
            } else {
                throw new \Exception('Page file not found ' . basename($pageFile));
            }
        } else {
            header('location:' . $settings->getProperty('404'));
            exit;
        }
    }
}