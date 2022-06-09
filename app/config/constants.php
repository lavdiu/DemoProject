<?php

use Laf\Util\Settings;

function setupConstants()
{
    $settings = Settings::getInstance();

    $settings->setProperty('allowed_upload_images', $_ALLOWED_IMAGES_MIME = array(
        'image/jpg',
        'image/jpeg',
        'image/png'
    ));
    $_server_name = filter_input(INPUT_SERVER, 'SERVER_NAME');
    $_protocol = filter_input(INPUT_SERVER, 'HTTPS') != '' || filter_input(INPUT_SERVER, 'SERVER_PORT') == 443 ? 'https' : 'http';


    if (in_array($_server_name, ['localhost'])) {
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    }

    $settings->setProperty('servername', $_server_name);
    $settings->setProperty('protocol', $_protocol);
    $settings->setProperty('homepage', $_protocol . '://' . $_server_name . '/');
    $settings->setProperty('homepage_path', dirname($_SERVER['PHP_SELF']).'/');
    $settings->setProperty('login_url', $settings->getProperty('homepage') .$settings->getProperty('homepage_path') . '?module=login');
    $settings->setProperty('reset_password', $settings->getProperty('homepage') . 'reset-password');
    $settings->setProperty('register_url', $settings->getProperty('homepage') . 'register');
    $settings->setProperty('404', $settings->getProperty('homepage') . 'errors/404.html');
    $settings->setProperty('settings.use_pretty_url', false);
    $settings->setProperty('settings.email.sender_address', 'my@gmail.com');
    $settings->setProperty('project.package_name', 'Lavdiu\\DemoApp');
    $settings->setProperty('project.project_name', 'DemoApp');
}

setupConstants();