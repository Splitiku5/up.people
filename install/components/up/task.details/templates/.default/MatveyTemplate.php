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
            <?= $arResult['task']['TITLE'] ?>
        </p>
        <p class="subtitle">
            <?= $arResult['task']['DESCRIPTION'] ?>
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
        <div>
            <p class="heading">Deadline</p>
            <p class="title"><?= $arResult['task']['DATE_DEADLINE']?></p>
        </div>
    </div>
</nav>
<div class="buttons is-justify-content-center">
    <button class="button is-info">Изменить задачу</button>
    <button class="button is-success ">Отметить выполненной</button>
    <button class="button is-danger ">Удалить задачу</button>
</div>

