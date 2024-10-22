<?php
require 'functions.php';
$data = loadData('вар1.csv');
$selectedTransport = $_POST['transport'];

$options = '<option value="">Выберите марку автомобиля</option>';

foreach ($data as $row) {
    if ($row['transport'] == $selectedTransport) {
        $options .= "<option value={$row['brand']}>{$row['brand']}</option>";
    }
}

echo $options;