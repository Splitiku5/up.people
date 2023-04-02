<?php

class TasksListComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        \Bitrix\Main\Loader::includeModule('up.tasks');
        $this->fetchTasksList();
        $this->includeComponentTemplate();
    }

    protected function prepareTemplateParams()
    {
        $this->arResult['DATE_FORMAT'] = $this->arParams['DATE_FORMAT'];
    }

    protected function fetchTasksList()
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        if ($request->getRequestMethod() === 'POST') {
            $result = \Up\Tasks\Tasks::createTask($request->getPostList());
            LocalRedirect('/');
            exit;
        } elseif ($request->getRequestMethod() === 'GET') {
            if ($request->get('query')) {
                $query = $request->get('query');
                $tasks = \Up\Tasks\Tasks::getTasks($query);
                $this->arResult['TASKS'] = $tasks;
            } else {
                $tasks = \Up\Tasks\Tasks::getTasks();
                $this->arResult['TASKS'] = $tasks;
            }
        }

    }
}