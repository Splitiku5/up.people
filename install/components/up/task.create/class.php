<?php

class TaskCreateComponent extends CBitrixComponent {
	public function executeComponent()
	{
		$this->fetchFields();
		$this->includeComponentTemplate();
	}

	protected function fetchFields()
	{
		Bitrix\Main\Loader::includeModule('up.tasks');


	}



}