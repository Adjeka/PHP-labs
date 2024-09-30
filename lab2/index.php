<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="printArticles.php" method="POST">
    <label>
        Рубрика
        <select name="category">
            <option value="tech">Технологии</option>
            <option value="sport">Спорт</option>
        </select>
    </label>
    <label>
        Дата
        <input type="text" name="date" placeholder="yyyy mm dd"
               pattern="(19|20)\d{2}\s(0[1-9]|1[0-2])\s(0[1-9]|[12][0-9]|3[01])"
               title="Введите дату в формате yyyy mm dd, например, 2023 09 06"
               required>
    </label>
    <input type="submit" value="Подтвердить">
</form>
</body>
</html>