<?php
require_once 'html.php';

// Подключение к базе данных
$connectionString = "pgsql:host=localhost;port=5432;dbname=lab1;user=pguser;password=password";
$pdo = new PDO($connectionString);

// Получаем ID объекта из URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Получаем данные объекта из базы данных
$sql = "SELECT name, description, image FROM landmarks WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$landmark = $stmt->fetch(PDO::FETCH_ASSOC);

// Если объект найден, выводим его данные
if ($landmark) {
    // Заголовок страницы
    $page = new HTMLPage($landmark['name']);

    // Контент страницы
    $name = $landmark['name'];
    $description = $landmark['description'];
    $image = $landmark['image'];

    $content = "<h2>{$name}</h2>";
    $content .= "<p>{$description}</p>";
    $content .= "<img src='img/{$image}' alt='{$name}' style='width:300px;'><hr>";

    // Получаем список всех объектов для меню
    $sql = "SELECT id, name, description FROM landmarks";
    $stmt = $pdo->query($sql);
    $landmarks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Формируем элементы меню для объектов
    $menu = [];
    foreach ($landmarks as $landmark) {
        $menu[] .= <<<HTML
                <li><a href='item.php?id={$landmark['id']}'>{$landmark['name']}</a></li> 
HTML;
    }

    // Выводим страницу
    $page->write($content, $menu);
} else {
    echo "Объект не найден.";
}

