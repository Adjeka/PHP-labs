<?php
// Файл с исходными данными
$inputFile = 'OLDBASE.txt';
// Новый файл для записи результатов
$outputFile = 'output.csv';

$errorCounts = ['Email' => 0, 'Пол' => 0];

$holidays = ['01/01', '07/01', '14/02', '23/02', '08/03', '01/05', '31/12'];
$menCount = 0;
$womenCount = 0;
$menData = ['totalHeight' => 0, 'totalWeight' => 0, 'totalAge' => 0, 'count' => 0];
$womenData = ['totalHeight' => 0, 'totalWeight' => 0, 'totalAge' => 0, 'count' => 0];
$holidayBirthdays = [];

// Функция для проверки email
function validateEmail($email) {
    global $errorCounts;
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    if (preg_match($pattern, $email)) {
        return $email;
    } else {
        // Удаляем все некорректные символы кроме латинских букв, цифр, @, .
        $cleanedEmail = preg_replace('/[^a-zA-Z0-9@.]/', '', $email);

        // Получаем количество символов @
        $count = substr_count($cleanedEmail, '@');
        if ($count > 1) {
            // Оставляем только первый символ @
            $cleanedEmail = preg_replace('/@.+/', '', $cleanedEmail) . '@' . substr(strrchr($cleanedEmail, '@'), 1);
        } elseif ($count < 1) {
            // Если нет @ возвращаем пустую строку
            return '';
        }

        // Убираем лишние точки в локальной части и доменной части
        $parts = explode('@', $cleanedEmail);
        $localPart = trim($parts[0], '.');
        $domainPart = trim($parts[1], '.');

        // Удаляем лишние точки в доменной части и проверяем наличие точки
        $domainPart = preg_replace('/\.{2,}/', '.', $domainPart); // Заменяем две и более точки на одну
        if (substr_count($domainPart, '.') < 1) {
            return ''; // Возвращаем пустую строку если в домене нет точки
        }

        // Собираем исправленный email
        $cleanedEmail = $localPart . '@' . $domainPart;

        $errorCounts['Email']++;
        return $cleanedEmail;
    }
}

// Функция для проверки пола
function validateGender($gender) {
    global $errorCounts;
    if ($gender === 'male' || $gender === 'female') {
        return $gender;
    }
    $errorCounts['Пол']++;
    return '';
}

// Функция для форматирования телефона
function formatPhone($phone) {
    $digits = preg_replace('/[^0-9]/', '', $phone); // Удаляем все символы кроме цифр
    $length = strlen($digits);
    if ($length == 8) {
        return substr($digits, 0, 1) . '-' . substr($digits, 1, 3) . '-' . substr($digits, 4);
    } elseif ($length == 9) {
        return substr($digits, 0, 2) . '-' . substr($digits, 2, 3) . '-' . substr($digits, 5);
    } elseif ($length == 10) {
        return substr($digits, 0, 3) . '-' . substr($digits, 3, 3) . '-' . substr($digits, 6);
    }
    return $phone;
}

// Функция для округления веса
function formatWeight($weight) {
    // Удаляем все символы кроме цифр и точки
    $weight = preg_replace('/[^0-9.]/', '', $weight);

    // Проверяем, является ли вес числом
    if (is_numeric($weight)) {
        return round($weight); // Преобразуем в число и округляем
    }

    // Если вес некорректный возвращаем 0
    return 0;
}

// Функция для расчета возраста
function calculateAge($birthDate) {
    $birthTimestamp = strtotime($birthDate);
    $age = date('Y') - date('Y', $birthTimestamp);
    if (date('md', $birthTimestamp) > date('md')) {
        $age--;
    }
    return $age;
}

// Функция для проверки корректности строки
function isValidEncoding($string, $encoding = 'UTF-8') {
    return mb_detect_encoding($string, $encoding, true) !== false;
}

// Чтение данных из файла
$lines = file($inputFile, FILE_IGNORE_NEW_LINES);
$output = fopen($outputFile, 'w');

// Обработка каждой строки
foreach ($lines as $line) {
    // Проверяем имеет ли строка корректную кодировку
    if (!isValidEncoding($line)) {
        continue; // Пропускаем строку с некорректной кодировкой
    }
    
    $fields = explode(',', $line);

    if (count($fields) < 17) {
        continue;
    }

    $recordNumber = str_pad($fields[0], 6, '0', STR_PAD_LEFT);
    $name = $fields[1];
    $middleInitial = $fields[2];
    $surname = $fields[3];
    $gender = validateGender($fields[4]);
    $city = $fields[5];
    $region = $fields[6];
    $email = validateEmail($fields[7]);
    $phone = formatPhone($fields[8]);
    $birthDate = $fields[9];
    $position = $fields[10];
    $company = $fields[11];
    $weight = formatWeight($fields[12]);
    $height = $fields[13];
    $postalAddress = $fields[14];
    $postalCode = $fields[15];
    $countryCode = $fields[16];
    
    // Запись строки в новый файл
    $outputLine = [
        $recordNumber,
        $name,
        $middleInitial,
        $surname,
        $gender,
        $city,
        $region,
        $email,
        $phone,
        $birthDate,
        $position,
        $company,
        $weight,
        $height,
        $postalAddress,
        $postalCode,
        $countryCode
    ];
    fputcsv($output, $outputLine, ';');

    // Сбор статистики
    if ($gender === 'male') {
        $menCount++;
        $menData['totalHeight'] += $height;
        $menData['totalWeight'] += $weight;
        $menData['totalAge'] += calculateAge($birthDate);
        $menData['count']++;
    } elseif ($gender === 'female') {
        $womenCount++;
        $womenData['totalHeight'] += $height;
        $womenData['totalWeight'] += $weight;
        $womenData['totalAge'] += calculateAge($birthDate);
        $womenData['count']++;
    }

    // Проверка на праздничные дни
    $birthDayMonth = date('d/m', strtotime($birthDate));
    if (in_array($birthDayMonth, $holidays)) {
        $holidayBirthdays[$birthDayMonth][] = $name;
    }
}

fclose($output);

// Расчет средних значений для мужчин и женщин
$menAvgHeight = round($menData['totalHeight'] / $menData['count'], 2);
$menAvgWeight = round($menData['totalWeight'] / $menData['count'], 2);
$menAvgAge = round($menData['totalAge'] / $menData['count'], 2);

$womenAvgHeight = round($womenData['totalHeight'] / $womenData['count'], 2);
$womenAvgWeight = round($womenData['totalWeight'] / $womenData['count'], 2);
$womenAvgAge = round($womenData['totalAge'] / $womenData['count'], 2);

//Вывод количества ошибок
echo "Количество ошибок для поля Email: " . $errorCounts['Email'] . "<br/>";
echo "Количество ошибок для поля Пол: " . $errorCounts['Пол'] . "<br/>";

// Вывод статистики
echo "Мужчин: $menCount, Женщин: $womenCount <br/>";
echo "Средний рост мужчин: $menAvgHeight, женщин: $womenAvgHeight <br/>";
echo "Средний вес мужчин: $menAvgWeight, женщин: $womenAvgWeight <br/>";
echo "Средний возраст мужчин: $menAvgAge, женщин: $womenAvgAge <br/>";

// Вывод людей, родившихся в праздничные дни
echo "Люди, родившиеся в праздничные дни: <br/>";
foreach ($holidayBirthdays as $date => $names) {
    echo "$date: " . implode(', ', $names) . "<br/>";
}
?>