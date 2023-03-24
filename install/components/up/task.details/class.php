<?php

use \Up\Tasks\Model\TasksTable;
class TaskDetailsComponent extends CBitrixComponent
{
	public function executeComponent()
	{
        \Bitrix\Main\Loader::includeModule('up.tasks');
		$this->prepareComponentParams();
		$this->fetchTask($this->arParams['id']);
		$this->includeComponentTemplate();
	}

	protected function prepareComponentParams()
	{
		$this->arParams['id'] = (int)$_REQUEST['id'];

	}

	protected function fetchTask($id)
    {

        $result = \Up\Tasks\Tasks::getTaskByID($id);
		foreach ($result->fetch() as $key => $row)
		{

			$task[$key] = $row ?: 'Не указано';
		}
		if ($task['DATE_DEADLINE'] === 'Не указано')
        {
            unset($task['DATE_DEADLINE']);
        }
        $arrPriority = TasksTable::getStatuses();
        $priority= "<select class='select is-link' name='Priority'>";
        $priorityElement = $task['PRIORITY'];

        foreach ($arrPriority as $value)
        {
            $selected = strtolower($priorityElement) === strtolower($value) ? 'selected' : '';
            $priority .= "<option $selected value='$value'>$value</option>";
        }
        $priority .= '</select>';

        $task['PRIORITY_SELECT'] = $priority;

        $arrStatus = TasksTable::getPriorities();
        $status = "<select class='select is-link' name='Status'>";
        $statusElement = $task['STATUS'];
        foreach ($arrStatus as $value)
        {
            $selected = strtolower($statusElement) === strtolower($value) ? 'selected' : '';
            $status .= "<option  $selected value='$value'>$value</option>";
        }
        $status .= '</select>';
        $task['STATUS_SELECT'] = $status;

		$this->arResult['task'] = $task;
	}
}