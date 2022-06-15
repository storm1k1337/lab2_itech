<?php

require_once __DIR__ . '/mongoCon.php';
$model = new Model();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
     <select id="processor">
        <option value="" selected disabled>Не выбрано</option>
        <? foreach ($model->getProcessors() as $processor) { ?>
        <option value="<?= $processor ?>"><?= $processor ?></option>
        <? } ?>
    </select>
    <ul id="processor-list"></ul>
</div>
<div>
    <select id="software">
        <option value="" selected disabled>Не выбрано</option>
        <? foreach ($model->getSoftwares() as $soft) { ?>
        <option value="<?= $soft ?>"><?= $soft ?></option>
        <? } ?>
    </select>
    <ul id="software-list"></ul>
</div>
<button id="expired">Товары с истёкшим сроком гарантии</button>
<ul id="expired-list"></ul>

<script src="script.js"></script>
</body>
</html>