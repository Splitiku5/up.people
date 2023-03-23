<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<section class="hero is-link">
	<div class="hero-body px-2 py-2">
		<p>
			<input class="input-title is-fullwidth" type="text" placeholder="Link input" value="<?= $arResult['task']['TITLE'] ?>">
		</p>
		<p>
			<textarea rows="5" class="input-desk is-fullwidth" type="text" placeholder="Link input"><?= $arResult['task']['DESCRIPTION'] ?></textarea>
		</p>
	</div>
</section>
<br>
<nav class="level">
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Date creation</p>
			<p class="title"><?= $arResult['task']['DATE_CREATION']->format('d.m.Y')?></p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Priority</p>
			<p class="title"><?= $arResult['task']['PRIORITY']?></p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Status</p>
			<p class="title"><?= $arResult['task']['STATUS']?></p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div class="control">
			<div class="heading">Deadline
				<input name="Date Deadline" type="date" class="input is-danger mb-4" value="<?= $arResult['task']['DATE_DEADLINE']->format('Y-m-d') ?>">
			</div>
		</div>
	</div>
	</div>
</nav>
<div class="buttons is-justify-content-right">
	<button class="button is-success ">Save</button>
	<button class="button is-danger ">Delete task</button>
</div>

