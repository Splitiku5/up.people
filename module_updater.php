<?php

use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;

function __projectorMigrate(int $nextVersion, callable $callback)
{
	global $DB;
	$moduleId = 'up.people';

	if (!ModuleManager::isModuleInstalled($moduleId))
	{
		return;
	}

	$currentVersion = intval(Option::get($moduleId, '~database_schema_version', 0));

	if ($currentVersion < $nextVersion)
	{
		include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/update_class.php');
		$updater = new \CUpdater();
		$updater->Init('', 'mysql', '', '', $moduleId, 'DB');

		$callback($updater, $DB, 'mysql');
		Option::set($moduleId, '~database_schema_version', $nextVersion);
	}
}

__projectorMigrate(2, function($updater, $DB)
{
	if ($updater->CanUpdateDatabase() && !$updater->TableExists('up_people'))
	{
		$DB->query("CREATE TABLE IF NOT EXISTS up_people
            (
                ID INT AUTO_INCREMENT NOT NULL,
                TITLE VARCHAR(255) NOT NULL,
            );
	");
	}
});
