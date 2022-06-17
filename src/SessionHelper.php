<?php

namespace Lavdiu\DemoApp;

class SessionHelper
{
    public static function getUserId()
    {
        return Person::getLoggedUserId();
    }

    public static function getCookieDeviceId(): ?string
    {
        return $_COOKIE['devsessid'] ?? null;
    }

}