<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
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
		<button class="js-modal-trigger button is-primary is-pulled-right" data-target="modal-js-example">
			Create new task
		</button>
	</div>
</div>

<div class="columns">
	<?php
	foreach ($arResult['TASKS'] as $tasks): ?>
		<div class="column">
			<div class="card project-card">
				<header class="card-header">
					<a class="card-header-title" href="/task/<?= $tasks['ID']; ?>/">
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
						<?= $tasks['DESCRIPTION']; ?>
					</div>
				</div>
				<footer class="card-footer">
					<a href="/task/<?= $tasks['ID']; ?>/" class="card-footer-item">View more</a>
					<a href="#" class="card-footer-item">Success</a>
				</footer>
			</div>
		</div>
	<?php
	endforeach; ?>
</div>

<div class="modal" id="modal-js-example">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Create new task</p>
			<button class="delete" aria-label="close"></button>
		</header>
		<section class="modal-card-body">
			<div class="field">
				<label class="label">Title</label>
				<div class="control">
					<input class="input is-primary mb-4 is-large" type="text" placeholder="Task title">
				</div>
			</div>
			<div class="field">
				<label class="label">Description</label>
				<div class="control">
					<input class="input is-primary mb-4 " type="text" placeholder="Task description">
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="field ">
						<label class="label">Deadline</label>
						<div class="control">
							<input type="date" class="input is-primary mb-4" type="text" placeholder="Task title">
						</div>

					</div>
				</div>
				<div class="column">
					<div class="select is-primary is-pulled-right">
						<div class="field">
							<label class="label">Priority</label>
							<div class="control">
								<select>
									<option>Low</option>
									<option>Normal</option>
									<option>High</option>
								</select>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
		<footer class="modal-card-foot">
			<button class="button is-success">Create task</button>
			<button class="button">Cancel</button>
		</footer>
	</div>
</div>


<script>
	document.addEventListener('DOMContentLoaded', () => {
		// Functions to open and close a modal
		function openModal($el)
		{
			$el.classList.add('is-active');
		}

		function closeModal($el)
		{
			$el.classList.remove('is-active');
		}

		function closeAllModals()
		{
			(document.querySelectorAll('.modal') || []).forEach(($modal) => {
				closeModal($modal);
			});
		}

		// Add a click event on buttons to open a specific modal
		(document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
			const modal = $trigger.dataset.target;
			const $target = document.getElementById(modal);

			$trigger.addEventListener('click', () => {
				openModal($target);
			});
		});

		// Add a click event on various child elements to close the parent modal
		(document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
			const $target = $close.closest('.modal');

			$close.addEventListener('click', () => {
				closeModal($target);
			});
		});

		// Add a keyboard event to close all modals
		document.addEventListener('keydown', (event) => {
			const e = event || window.event;

			if (e.keyCode === 27)
			{ // Escape key
				closeAllModals();
			}
		});
	});
</script>