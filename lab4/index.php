<?php
require_once 'html.php';

// Подключаемся в базу данных
$connectionString = "pgsql:host=localhost;port=5432;dbname=lab1;user=pguser;password=password";
$pdo = new PDO($connectionString);

// Получаем все объекты из базы данных
$sql = "SELECT id, name, description FROM landmarks";
$stmt = $pdo->query($sql);
$landmarks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Инициализируем страницу
$page = new HTMLPage("Главная страница");

// Формируем элементы меню для объектов и контент для главной страницы
$content = "";
$menu = [];
foreach ($landmarks as $landmark) {
    $menu[] .= <<<HTML
                <li><a href='item.php?id={$landmark['id']}'>{$landmark['name']}</a></li> 
HTML;
    
    $id = $landmark['id'];
    $name = $landmark['name'];
    $description = $landmark['description'];
    ($id > 9) ? $image = "t{$id}" : $image = "t0{$id}";
    
    $content .= "<h2>{$name}</h2>";
    $content .= "<p>{$description}</p>";
    $content .= "<img src='img/{$image}.jpg' alt='{$name}' style='width:300px;'><hr>";
}

// Выводим страницу
$page->write($content, $menu);