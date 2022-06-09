<?php

use Laf\Generator\DatabaseGenerator;
use Laf\Util\Settings;

require_once __DIR__ . '/../config/config.php';

ob_start();
echo "<pre>Starting Class Generation";
$library_path = __DIR__ . '/../../src/';
$dbg = new DatabaseGenerator($library_path);
$dbg->setConfig([
    'namespace' => Settings::get('project.package_name'),
    'base_class_dir' => $library_path . '/Base',
    'class_dir' => $library_path . '/',
    'page_dir' => __DIR__ . '/../../generator_cache/pages/',
    'live_page_dir' => __DIR__ . '/../view/',
    'rewrite_class' => false
]);
$dbg->generateEverything();
echo "\nAll tables processed\n\n";
