<?php

class TasksListComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->prepareTemplateParams();
		$this->fetchTasksList($this->arParams['query']);
		$this->includeComponentTemplate();
        \Bitrix\Main\Loader::includeModule('up.tasks');
	}

	public function onPrepareComponentParams($arParams)
	{
		$arParams['DATE_FORMAT'] = $arParams['DATE_FORMAT'] ?? 'd.m.Y';

		return $arParams;
	}

	protected function prepareTemplateParams()
	{
		$this->arResult['DATE_FORMAT'] = $this->arParams['DATE_FORMAT'];
	}

	protected function fetchTasksList($query = '')
	{

        $tasks = \Up\Tasks\Tasks::getTasks($query);
		$this->arResult['TASKS'] = $tasks;
	}
}