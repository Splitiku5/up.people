<?php

use Bitrix\Main\Routing\Controllers\PublicPageController;
use Bitrix\Main\Routing\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

	$routes->get('/', new PublicPageController('/local/modules/up.tasks/views/task-list.php'));
    $routes->post('/', new PublicPageController('/local/modules/up.tasks/views/task-create.php'));

    $routes->get('/delete/{id}/', new PublicPageController('/local/modules/up.tasks/views/task-delete.php'))->where('id', '[0-9]+');


	$routes->get('/tasks/', new PublicPageController('/local/modules/up.tasks/views/task-list.php'));

	$routes->get('/task/{id}/', new PublicPageController('/local/modules/up.tasks/views/task-details.php'))->where('id', '[0-9]+');

	$routes->get('/task/create/', new PublicPageController('/local/modules/up.tasks/views/task-create.php'));
};