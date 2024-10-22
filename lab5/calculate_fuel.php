<?php
require 'functions.php';
$data = loadData('вар1.csv');

$selectedTransport = $_POST['transport'];
$selectedBrand = $_POST['brand'];
$distance = $_POST['distance'];

$fuelConsumption = 0;

foreach ($data as $row) {
    if ($row['transport'] == $selectedTransport && $row['brand'] == $selectedBrand) {
        $fuelConsumption = $row['fuelconsumption'];
        break;
    }
}

$result = $fuelConsumption * $distance / 100;
echo $result;