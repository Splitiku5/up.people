<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if ($arResult['task']['errors']):
	foreach ($arResult['task']['errors'] as $message): ?>
	 <article class="message is-danger">
		<div class="message-header">
			<p>Произошла ошибка</p>
		</div>
		<div class="message-body">
			<?= ' . $message . ' ?>
		</div>
	 </article>
	 <?php endforeach; ?>
<?php endif; ?>

<form method="post" action="" name="Update task">
<section class="hero is-link <?= htmlspecialchars($arResult['task']['STATUS'])?> <?= htmlspecialchars($arResult['task']['PRIORITY'])?>">
	<div class="hero-body px-2 py-2">
		<input type="hidden" name="ID" value="<?=$arResult['task']['ID']?>">
		<p>
			<input name="TITLE" class="input-title is-fullwidth" type="text" placeholder="Link input" value="<?= htmlspecialchars($arResult['task']['TITLE']) ?>">
		</p>
		<p>
			<textarea name="DESCRIPTION" rows="5" class="input-desk is-fullwidth" type="text" placeholder="Link input"><?= htmlspecialchars($arResult['task']['DESCRIPTION']) ?></textarea>
		</p>
	</div>
</section>
<br>
<nav class="level">
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Date creation</p>
			<p class="title" name="DATE_CREATION"><?= htmlspecialchars($arResult['task']['DATE_CREATION'])?></p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Priority</p>
			<p class="select is-link" name="PRIORITY"><?= $arResult['task']['PRIORITY_SELECT']?></p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Status</p>
			<p class="select is-link" name="STATUS"><?= $arResult['task']['STATUS_SELECT']?></p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div class="control">
			<div class="heading">Deadline
				<input name="DATE_DEADLINE" type="date" class="input is-link" value="<?= $arResult['task']['DATE_DEADLINE'] ? htmlspecialchars($arResult['task']['DATE_DEADLINE']->format('Y-m-d')) : 'null' ?>">
			</div>
		</div>
	</div>

</nav>
<div class="buttons is-justify-content-right">
	<button class="button is-success" type="submit">Save</button>
	<a class="button is-danger" href="/delete/<?= $arResult['task']['ID']?>/" onclick="return confirm('Do you want delete this task?')">Delete task</a>
</form>
</div>

