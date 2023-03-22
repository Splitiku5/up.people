<?php
/**
 * @var CMain $APPLICATION
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Tasks");
$APPLICATION->IncludeComponent('up:task.list', '', [
	'DATE_FORMAT' => 'd.M H:i',
]);
var_dump($_POST);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>