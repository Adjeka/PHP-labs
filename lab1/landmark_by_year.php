<?php
require 'functions.php';

$pdo = connectToDatabase('pguser', 'password');

if (is_string($pdo)) {
    echo $pdo; // Выводим сообщение об ошибке
} else {
    $year = $_POST['year'];
    echo getLandmarkByYear($pdo, $year);
}
?>