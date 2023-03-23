<?php
/**
 * @var CMain $APPLICATION
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Tasks");
var_dump($_POST['deadline']);
Bitrix\Main\Loader::includeModule('up.tasks');
$result = \Up\Tasks\TasksTable::createObject()
                                ->setTitle($_POST['title'])
                                ->setDescription($_POST['description'] ?: '')
                                ->setDateCreation(new \Bitrix\Main\Type\DateTime())
                                ->setDateDeadline(((new \Bitrix\Main\Type\DateTime($_POST['deadline'],'Y-m-d'))) ?: '')
                                ->setPriority($_POST['priority'])
                                ->save();
if (!$result->isSuccess())
{
	$messages = $result->getErrorMessages();
	foreach ($messages as $message)
	{
		echo '<article class="message is-danger">
		  <div class="message-header">
			<p>Произошла ошибка</p>
		  </div>
		  <div class="message-body">
			' . $message . '
		  </div>
		</article>';
	}
}
header('Location: /');
$APPLICATION->IncludeComponent('up:task.list', '', []);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>