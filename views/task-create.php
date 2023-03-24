<?php
/**
 * @var CMain $APPLICATION
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Tasks");

    $result = \Up\Tasks\Tasks::createTask($_POST);

    if (!$result->isSuccess())
    {
        $messages = $result->getErrorMessages();
        foreach ($messages as $message)
        {
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

    header('Location: /');

    $APPLICATION->IncludeComponent('up:task.list', '', []);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>