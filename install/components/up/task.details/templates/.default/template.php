<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<section class="hero is-link">
	<div class="hero-body">
		<p class="title">
			<?= $arResult['task']['title'] ?>
		</p>
		<p class="subtitle">
			<?= $arResult['task']['description'] ?>
		</p>
	</div>
</section>
<br>
<nav class="level">
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Дата создания</p>
			<p class="title"><?= $arResult['task']['date_creation']->format('d.m.Y')?></p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Приоритет</p>
			<p class="title"><?= $arResult['task']['priority']?></p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Статус</p>
			<p class="title"><?= $arResult['task']['status']?></p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Дедлайн</p>
			<p class="title"><?= $arResult['task']['date_deadline']->format('d.m.Y')?></p>
		</div>
	</div>
</nav>
<div class="buttons is-justify-content-center">
	<button class="button is-info">Изменить задачу</button>
	<button class="button is-success ">Отметить выполненной</button>
	<button class="button is-danger ">Удалить задачу</button>
</div>

