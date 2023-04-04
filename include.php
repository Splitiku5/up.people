<?php

use Bitrix\Main\Application;
use Bitrix\Main\DB\Connection;
use Bitrix\Main\Request;

Bitrix\Main\Loader::includeModule('up.people');
function request(): Request
{
    return Application::getInstance()->getContext()->getRequest();
}

function db(): Connection
{
    return Application::getConnection();
}

if (file_exists(__DIR__ . '/module_updater.php')) {
    include(__DIR__ . '/module_updater.php');
}
