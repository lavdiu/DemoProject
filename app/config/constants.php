<?php

use Laf\Util\Settings;

function setupConstants(): void
{
    $settings = Settings::getInstance();

    $settings->setProperty('allowed_upload_images', array(
        'image/jpg',
        'image/jpeg',
        'image/png'
    ));

    $settings->setProperty('servername', filter_input(INPUT_SERVER, 'SERVER_NAME'));
    $settings->setProperty('protocol', filter_input(INPUT_SERVER, 'HTTPS') != '' || filter_input(INPUT_SERVER, 'SERVER_PORT') == 443 ? 'https' : 'http');
    $settings->setProperty('server_port', $_SERVER['SERVER_PORT']??'' != 80 ? ':' . $_SERVER['SERVER_PORT']??'' : '');
    $settings->setProperty('homepage', $settings->getProperty('protocol') . '://' . $settings->getProperty('servername') . $settings->getProperty('server_port') . '/');
    $settings->setProperty('homepage_path', dirname($_SERVER['PHP_SELF']) . '/');
    $settings->setProperty('login_url', $settings->getProperty('homepage') . $settings->getProperty('homepage_path') . '?module=login');
    $settings->setProperty('reset_password', $settings->getProperty('homepage') . $settings->getProperty('homepage_path') . 'reset-password');
    $settings->setProperty('register_url', $settings->getProperty('homepage') . $settings->getProperty('homepage_path') . 'register');
    $settings->setProperty('404', $settings->getProperty('homepage') . $settings->getProperty('homepage_path') . 'errors/404.html');
    $settings->setProperty('settings.use_pretty_url', false);
    $settings->setProperty('settings.email.sender_address', 'my@gmail.com');
    $settings->setProperty('project.package_name', 'Lavdiu\\DemoApp');
    $settings->setProperty('project.project_name', 'DemoApp');

}

setupConstants();