<?php

namespace Up\Tasks;

use Bitrix\Main\Type\DateTime;
use Up\Tasks\Model\TasksTable;

class Tasks
{

    public static function getTasks($query = '')
    {
        if (!$query) {

            $result = TasksTable::getList(['select' => ['*']]);
        } else {
            $result = TasksTable::getList([
                'filter' => [
                    'LOGIC' => 'OR',
                    '=%TITLE' => "%$query%",
                    '=%DESCRIPTION' => "%$query%",
                ]
            ]);
        }

        return $result->fetchAll();
    }

    public static function getTaskByID($id)
    {
        return TasksTable::getById($id);
    }

    public static function createTask($arguments)
    {
        if ($arguments['deadline']) {
            if (\Bitrix\Main\Type\DateTime::isCorrect($arguments['deadline'], 'Y-m-d')) {
                $deadline = new \Bitrix\Main\Type\DateTime($arguments['deadline'], 'Y-m-d');
            } else {
                $deadline = '';
            }
        }
        return TasksTable::createObject()
            ->setTitle($arguments['title'])
            ->setDescription($arguments['description'] ?: '')
            ->setDateCreation(new \Bitrix\Main\Type\DateTime())
            ->setDateDeadline($deadline ?: '')
            ->setPriority($arguments['priority'])
            ->save();
    }

    public static function deleteTask($id): void
    {
        TasksTable::delete($id);
    }

    public static function updateTask($arguments)
    {
        $result = TasksTable::getById((int)$arguments['ID'])->fetchObject();
        if (!$result)
        {
            LocalRedirect('/');
        }
        if ($arguments['DATE_DEADLINE']) {
            if (\Bitrix\Main\Type\DateTime::isCorrect($arguments['DATE_DEADLINE'], 'Y-m-d')) {
                $deadline = new \Bitrix\Main\Type\DateTime($arguments['DATE_DEADLINE'], 'Y-m-d');
            } else {
                $deadline = '';
            }
        }
        return $result
            ->setTitle($arguments['TITLE'])
            ->setDescription($arguments['DESCRIPTION'] ?: '')
            ->setDateDeadline($deadline ?: '')
            ->setPriority($arguments['Priority'])
            ->setStatus($arguments['Status'])
            ->setDateUpdate(new \Bitrix\Main\Type\DateTime())
            ->save();
    }
}