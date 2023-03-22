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
		foreach ($result->fetch() as $key => $row)
		{
			$task[$key] = $row ?: 'Не указано';
		}
		$task['DATE_DEADLINE']!=='Не указано' ?:  $task['DATE_CREATION']->format('d.m.Y');


		$this->arResult['task'] = $task;
	}



}