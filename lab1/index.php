<form method="POST" action="connect_to_db.php">
    <label for="username">Имя пользователя:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Подключиться">
</form>

<form method="POST" action="landmark_by_id.php">
    <label for="landmark_id">ID достопримечательности:</label>
    <input type="number" id="landmark_id" name="landmark_id" required><br><br>

    <input type="submit" value="Показать достопримечательность">
</form>

<form method="POST" action="landmark_by_year.php">
    <label for="year">Год:</label>
    <input type="number" id="year" name="year" required><br><br>

    <input type="submit" value="Найти по году">
</form>