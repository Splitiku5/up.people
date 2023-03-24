<?php
/**
 * @var CMain $APPLICATION
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Tasks");
\Bitrix\Main\Loader::includeModule('up.tasks');

    $result = \Up\Tasks\Tasks::updateTask($_POST);

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

$APPLICATION->IncludeComponent('up:task.details', '', []);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>