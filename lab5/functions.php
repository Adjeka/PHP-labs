<?php
// Функция для загрузки данных из CSV файла
function loadData($filename) {
    $connectionString = "pgsql:host=localhost;port=5432;dbname=lab5;user=pguser;password=password";
    $pdo = new PDO($connectionString);

    $sql = "SELECT id, transport, brand, fuelconsumption FROM transports";
    $stmt = $pdo->query($sql);
    $transports = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $transports;
}
?>
