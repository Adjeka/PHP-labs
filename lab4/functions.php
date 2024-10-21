<?php
function connectToDatabase($username, $password) {
    $dsn = "pgsql:host=localhost;port=5432;dbname=lab1;user=$username;password=$password";
    try {
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        return "Ошибка: " . $e->getMessage();
    }
}

function getLandmarkById($pdo, $id) {
    $sql = "SELECT name, description FROM landmarks WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $landmark = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($landmark) {
        $name = $landmark['name'];
        $description = $landmark['description'];
        ($id > 9) ? $image = "t{$id}" : $image = "t0{$id}";
        return <<<HTML
            <h2>{$name}</h2>
            <p>{$description}</p>
            <img src='img/{$image}.jpg' alt='{$name}' style='width:300px;'>
HTML;
    } else {
        return <<<HTML
            <p>Достопримечательность с ID $id не найдена</p>
HTML;
    }
}

function getLandmarkByYear($pdo, $year) {
    $sql = "SELECT id, name, description FROM landmarks WHERE description LIKE :year";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['year' => '%' . $year . '%']);
    $landmarks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($landmarks) {
        $result = "";
        foreach ($landmarks as $landmark) {
            $id = $landmark['id'];
            $name = $landmark['name'];
            $description = $landmark['description'];
            ($id > 9) ? $image = "t{$id}" : $image = "t0{$id}";
            $result .= <<<HTML
                <h2>{$name}</h2>
                <p>{$description}</p>
                <img src='img/{$image}.jpg' alt='{$name}' style='width:300px;'>
HTML;
        }
        return $result;
    } else {
        return <<<HTML
            <p>Достопримечательности, связанные с годом $year, не найдены.</p>
HTML;
    }
}