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
    $settings->setProperty('server_port', $_SERVER['SERVER_PORT'] ?? '80' != 80 ? ':' . $_SERVER['SERVER_PORT'] ?? '' : '');
    $settings->setProperty('homepage_path', dirname($_SERVER['PHP_SELF']));
    $settings->setProperty('homepage', $settings->getProperty('protocol') . '://' . $settings->getProperty('servername') . $settings->getProperty('server_port') . '/' . $settings->getProperty('homepage_path'));
    $settings->setProperty('login_url', $settings->getProperty('homepage') . '?module=login');
    $settings->setProperty('reset_password', $settings->getProperty('homepage') . $settings->getProperty('homepage_path') . 'reset-password');
    $settings->setProperty('register_url', $settings->getProperty('homepage') . $settings->getProperty('homepage_path') . 'register');
    $settings->setProperty('404', $settings->getProperty('homepage') . $settings->getProperty('homepage_path') . 'errors/404.html');
    $settings->setProperty('settings.use_pretty_url', false);


    $settings->setProperty('project.package_name', 'Lavdiu\\DemoApp');
    $settings->setProperty('project.project_name', 'DemoApp');
    $settings->setProperty('code_repo_link', 'https://github.com/lavdiu/DemoProject/');

    $mariadb_backup_volumen_mountpoint = getenv('MARIADB_BACKUP_VOLUME_MOUNTPOINT') ?? '/var/lib/mysql_backup/';

    $settings->setProperty('backups.daily.path', $mariadb_backup_volumen_mountpoint . 'daily/');
    $settings->setProperty('backups.daily.retention_days', '30');
    $settings->setProperty('backups.hourly.path', $mariadb_backup_volumen_mountpoint . 'hourly/');
    $settings->setProperty('backups.hourly.retention_days', '10');
    $settings->setProperty('backups.mysql_dump_bin.path', '/usr/bin/mysqldump');

    $settings->setProperty('app.exception_notification_recipient.email', 'lulzimavdiu@gmail.com');
    $settings->setProperty('settings.email.sender_address', 'my@gmail.com');
    $settings->setProperty('comm.email_from', 'asm@autopjesepartner.com');
    $settings->setProperty('comm.email_from_name', $settings->getProperty('project.project_name'));
    $settings->setProperty('comm.smtp.clientid', '');
    $settings->setProperty('comm.smtp.secret', '');
    $settings->setProperty('comm.smtp.refresh_token', '');
    $settings->setProperty('settings.email.sender_address', 'asm@autopjesepartner.com');
    $settings->setProperty('email_smtp_config', [
        'Host' => 'smtp.gmail.com',
        'Port' => 587,
        'SMTPAuth' => true,
        'AuthType' => 'XOAUTH2',
        'Username' => 'asm@autoservicepartner.com',
        'Password' => '',
        'debug' => 0,
        'SMTPDebug' => 0,
        'SMTPSecure' => 'tls',
    ]);

}

setupConstants();