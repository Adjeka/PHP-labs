<?php
require 'functions.php';

$username = $_POST['username'];
$password = $_POST['password'];

$pdo = connectToDatabase($username, $password);

if (is_string($pdo)) {
    echo $pdo;
} else {
    echo "Подключение успешно!";
}
?>