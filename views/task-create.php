<?php
/**
 * @var CMain $APPLICATION
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Tasks");
Bitrix\Main\Loader::includeModule('up.tasks');
$result = \Up\Tasks\TasksTable::add([
	'TITLE' => $_POST['title'],
	'DESCRIPTION' => $_POST['description'] ?: '',
	'DATE_CREATION' => \Bitrix\Main\Type\Date::createFromPhp(new DateTime()),
	'DATE_DEADLINE' => strtotime($_POST['deadline']) ?: '',
	'PRIORITY' => $_POST['priority'],
  	]);
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

$APPLICATION->IncludeComponent('up:task.list', '', [

]);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>