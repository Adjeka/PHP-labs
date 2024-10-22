<?php
require 'functions.php';
$data = loadData('вар1.csv');

$transports = array_unique(array_column($data, 'transport'));
$transportsHtml = "";
foreach ($transports as $transport) {
    $transportsHtml .= "<option value=\"$transport\">$transport</option>";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор расхода бензина</title>
</head>
<body>
<form id="fuelForm">
    <label for="transport">Вид транспорта:</label>
    <select id="transport" name="transport">
        <option value="">Выберите вид транспорта</option>
        <?php
            echo $transportsHtml;
        ?>
    </select>

    <br><br>

    <label for="brand">Марка автомобиля:</label>
    <select id="brand" name="brand">
        <option value="">Сначала выберите вид транспорта</option>
    </select>

    <br><br>

    <label for="distance">Расстояние (км):</label>
    <input type="number" step="0.01" id="distance" name="distance">

    <br><br>

    <label for="fuelConsumption">Расход бензина (литры):</label>
    <input type="text" id="fuelConsumption" name="fuelConsumption" readonly>
</form>

<script>
    //Используем Fetch API с async/await для получения типов публикаций
    document.getElementById('transport').addEventListener('change', async function () {
        let transport = this.value;
        console.log('Selected transport:', transport); // Отладочный вывод

        if (transport) {
            try {
                const response = await fetch('get_brands.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'transport=' + encodeURIComponent(transport)
                });

                const data = await response.text();
                document.getElementById('brand').innerHTML = data; // Обновляем селект с марками
                document.getElementById('fuelConsumption').value = '';  // Сброс расхода
            } catch (error) {
                console.error('Ошибка при загрузке марок автомобилей:', error);
            }
        }
    });

    document.getElementById('brand').addEventListener('change', calculateFee);
    document.getElementById('distance').addEventListener('input', calculateFee);

    async function calculateFee() {
        let transport = document.getElementById('transport').value;
        let brand = document.getElementById('brand').value;
        let distance = document.getElementById('distance').value;

        if (brand === "") {
            document.getElementById('fuelConsumption').value = ''; // Очищаем сумму, если марка пустая
            return;
        }

        if (transport && brand && distance > 0) {
            try {
                const response = await fetch('calculate_fuel.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'transport=' + encodeURIComponent(transport) +
                        '&brand=' + encodeURIComponent(brand) +
                        '&distance=' + encodeURIComponent(distance)
                });

                document.getElementById('fuelConsumption').value = await response.text();
            } catch (error) {
                console.error('Ошибка при расчёте расхода бензина:', error);
            }
        } else {
            document.getElementById('fuelConsumption').value = ''; // Очищаем сумму, если не все параметры выбраны
        }
    }
</script>
</body>
</html>
