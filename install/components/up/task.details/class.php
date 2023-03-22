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
		$task = [
			'id' => $id,
			'title' => 'New task',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid aspernatur atque delectus doloribus eaque eligendi fugiat labore magni minus mollitia natus neque nobis, obcaecati possimus quaerat quam quia quibusdam saepe veniam, vero voluptatem voluptates. Animi blanditiis doloremque dolores enim eveniet hic labore laudantium necessitatibus nihil nulla quia reiciendis, repudiandae, sunt voluptates voluptatibus! Adipisci earum eius itaque laboriosam magni quia.',
			'date_creation' => new DateTime(),
			'status' => 'В процессе',
			'priority' => 'Высокий',
			'date_deadline' => new DateTime(),
		];
		Bitrix\Main\Loader::includeModule('up.tasks');
		$result = \Bitrix\Tasks\TasksTable::getTitle();
		if (!$result->isSuccess())
		{
			die('something wrong');
		}
		var_dump($result);
		$this->arResult['task'] = $task;
	}



}