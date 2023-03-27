<?php

use \Up\Tasks\Model\TasksTable;
class TaskDetailsComponent extends CBitrixComponent
{
	public function executeComponent()
	{
        \Bitrix\Main\Loader::includeModule('up.tasks');
		$this->prepareComponentParams();
		$this->fetchTask();
		$this->includeComponentTemplate();
	}

	protected function prepareComponentParams()
	{

	}

	protected function fetchTask()
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $id = $request->get('id');
        if ($request->getRequestMethod() === 'POST')
        {
            $result = \Up\Tasks\Tasks::updateTask($request->getPostList());

            if (!$result->isSuccess()) {
                $messages = $result->getErrorMessages();
                foreach ($messages as $message) {
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
        }
        $result = \Up\Tasks\Tasks::getTaskByID($id);
        foreach ($result->fetch() as $key => $row)
        {

            $task[$key] = $row ?: 'Не указано';
        }
        if ($task['DATE_DEADLINE'] === 'Не указано')
        {
            unset($task['DATE_DEADLINE']);
        }
        $arrPriority = TasksTable::getPriorities();
        $priority= "<select class='select is-link' name='Priority'>";
        $priorityElement = $task['PRIORITY'];

        foreach ($arrPriority as $value)
        {
            $selected = strtolower($priorityElement) === strtolower($value) ? 'selected' : '';
            $priority .= "<option $selected value='$value'>$value</option>";
        }
        $priority .= '</select>';

        $task['PRIORITY_SELECT'] = $priority;

        $arrStatus = TasksTable::getStatuses();
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