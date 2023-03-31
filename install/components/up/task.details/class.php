<?php

use \Up\Tasks\Model\TasksTable;

class TaskDetailsComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        \Bitrix\Main\Loader::includeModule('up.tasks');
        $this->fetchTask();
        $this->includeComponentTemplate();
    }

    protected function fetchTask()
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $id = (int)$request->get('id');
        if ($request->getRequestMethod() === 'POST') {
            $result = \Up\Tasks\Tasks::updateTask($request->getPostList());

            if (!$result->isSuccess()) {
                $task['errors'] = $result->getErrorMessages();
            }
        }
        $result = \Up\Tasks\Tasks::getTaskByID($id);
        $taskExist = $result;
//        if (!$taskExist->fetch())
//        {
//            LocalRedirect('/');
//        }

        foreach ($result->fetch() as $key => $row) {
            $task[$key] = $row ?: 'Не указано';
        }
        if ($task['DATE_DEADLINE'] === 'Не указано') {
            unset($task['DATE_DEADLINE']);
        }
        $arrPriority = TasksTable::getPriorities();
        $priority = "<select class='select is-link' name='Priority'>";
        $priorityElement = htmlspecialchars($task['PRIORITY']);

        foreach ($arrPriority as $value) {
            $selected = strtolower($priorityElement) === strtolower($value) ? 'selected' : '';
            $priority .= "<option $selected value='$value'>$value</option>";
        }
        $priority .= '</select>';

        $task['PRIORITY_SELECT'] = $priority;

        $arrStatus = TasksTable::getStatuses();
        $status = "<select class='select is-link' name='Status'>";
        $statusElement = htmlspecialchars($task['STATUS']);
        foreach ($arrStatus as $value) {
            $selected = strtolower($statusElement) === strtolower($value) ? 'selected' : '';
            $status .= "<option  $selected value='$value'>$value</option>";
        }
        $status .= '</select>';
        $task['STATUS_SELECT'] = $status;

        $task['DATE_CREATION']->format('d.m.Y');
        $this->arResult['task'] = $task;
    }
}