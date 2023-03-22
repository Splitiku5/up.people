<?php

class TaskDetailsComponent extends CBitrixComponent {
	public function executeComponent()
	{
		$this->prepareComponentParams();
		$this->fetchTask($this->arParams['id']);
		$this->includeComponentTemplate();

	}

	protected function prepareComponentParams()
	{
		$this->arParams['id'] = (int)$_REQUEST['id'];
	}

	protected function fetchTask($id) {

		Bitrix\Main\Loader::includeModule('up.tasks');
		$result = \Up\Tasks\TasksTable::getById($id);
		$task = $result->fetch();

		$this->arResult['task'] = $task;
	}



}