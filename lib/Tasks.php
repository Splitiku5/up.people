<?php
namespace Up\Tasks;

use Bitrix\Main;

class Tasks
{

    public static function getTasks($query = '')
    {
        if (!$query)
        {
            $result = \Up\Tasks\TasksTable::getList(['select' => ['*']]);
        }
        else
        {
            var_dump($query);
        }

        return $result->fetchAll();
    }

    public static function getTaskByID($id)
    {
        return \Up\Tasks\TasksTable::getById($id);
    }

    public static function createTask($arguments)
    {
        return \Up\Tasks\TasksTable::createObject()
            ->setTitle($arguments['title'])
            ->setDescription($arguments['description'] ?: '')
            ->setDateCreation(new \Bitrix\Main\Type\DateTime())
            ->setDateDeadline(((new \Bitrix\Main\Type\DateTime($arguments['deadline'],'Y-m-d'))) ?: '')
            ->setPriority($arguments['priority'])
            ->save();
    }
    public static function deleteTask($id): void
    {
        \Up\Tasks\TasksTable::delete($id);
    }

    public static function updateTask($arguments)
    {
        $result = \Up\Tasks\TasksTable::getById((int)$_POST['ID'])->fetchObject()
            ->setTitle($arguments['TITLE'])
            ->setDescription($arguments['DESCRIPTION'] ?: '')
            ->setDateDeadline(((new \Bitrix\Main\Type\DateTime($arguments['DATE_DEADLINE'], 'Y-m-d'))) ?: '')
            ->setPriority($arguments['Priority'])
            ->setStatus($arguments['Status'])
            ->setDateUpdate(new \Bitrix\Main\Type\DateTime())
            ->save();
    }
}