<?php
require 'functions.php';

$pdo = connectToDatabase('pguser', 'password');

if (is_string($pdo)) {
    echo $pdo; // Выводим сообщение об ошибке
} else {
    $id = $_POST['landmark_id'];
    echo getLandmarkById($pdo, $id);
}
?>