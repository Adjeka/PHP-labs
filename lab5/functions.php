<?php
// Функция для загрузки данных из CSV файла
function loadData($filename) {
    $data = [];
    if (($handle = fopen($filename, "r")) !== FALSE) {
        fgetcsv($handle, 1000, ";"); // Пропускаем заголовок
        while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $fuelConsumption = str_replace(',', '.', $row[2]);
            $data[] = [
                'transport' => $row[0],
                'brand' => $row[1],
                'fuelConsumption' => (float) $fuelConsumption
            ];
        }
        fclose($handle);
    }
    return $data;
}
?>
