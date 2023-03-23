<?php
/**
 * @var CMain $APPLICATION
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Tasks");

        $id = (int)$_REQUEST['id'];
        Bitrix\Main\Loader::includeModule('up.tasks');
        $result = \Up\Tasks\TasksTable::delete($id);
        header('Location: /');

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>





