<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<div class="columns mb-6">
	<div class="column">
		<div class="field">
			<div class="control">
				<input class="input" type="text" placeholder="Search for project">
			</div>
		</div>
	</div>
	<div class="column">
		<a class="button is-success is-pulled-right" href="/projects/create/">Create project</a>
	</div>
</div>

<div class="columns">
	<?php foreach ($arResult['TASKS'] as $tasks): ?>
	<div class="column">
		<div class="card project-card">
			<header class="card-header">
				<a class="card-header-title" href="/task/<?=$tasks['ID'];?>/">
					<?= $tasks['TITLE']; ?>
				</a>
				<button class="card-header-icon" aria-label="more options">
					<span class="icon disabled">
						⭐
					</span>
				</button>
			</header>
			<div class="card-content">
				<div class="content">
					<?=$tasks['DESCRIPTION'];?>
				</div>
			</div>
			<footer class="card-footer">
				<a href="/task/<?=$tasks['ID'];?>/" class="card-footer-item">View more</a>
				<a href="#" class="card-footer-item">Success</a>
			</footer>
		</div>
	</div>
	<?php endforeach; ?>
</div>

