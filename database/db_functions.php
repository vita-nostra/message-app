<?php

function insertData(PDO $pdo, string $sql, array $executeArr = null): void
{
    try {
        $data = $pdo->prepare($sql);
        $data->execute($executeArr);
    } catch (PDOException $e) {
        echo 'Ошибка: ' . $e->getMessage();
    }
}

function createTable(PDO $pdo, string $sql, string $tableName): void
{
    try {
        $pdo->exec($sql);
        echo "Таблица " . $tableName . " готова к использованию.\n";
    } catch (PDOException $e) {
        echo 'Ошибка ' . $e->getMessage();
    }
}

function selectID(PDO $pdo, string $sql, array $insertData): int|null
{
    $fields = $pdo->prepare($sql);
    $fields->execute($insertData);
    $field = $fields->fetchAll();

    if (!empty($field)) {
        $field = array_shift($field);
        return $field['id'];
    }
    return null;
}

function dataGeneration(): array
{
    $firstName = ["Александр", "Светлана", "Игорь", "Наталья", "Валерий", "Людмила", "Алексей", "Юлия", "Сергей", "Ирина", "Андрей", "Надежда", "Олег"];
    $lastName = ["Коваленко", "Волк", "Вувич", "Онищенко", "Горковенко", "Цветкович", "Шевченко", "Черных", "Крученых", "Гришко", "Гримм", "Ткачук", "Седых", "Пономаренко"];
    $email = uniqid() . "@mail.ru";
    $city = ["Ульяновск", "Санкт-Петербург", "Москва"];

    return [
        'firstName' => $firstName[array_rand($firstName)],
        'lastName' => $lastName[array_rand($lastName)],
        'email' => $email,
        'city' => $city[array_rand($city)],
    ];
}

function messageGeneration(): string
{
    $message = file_get_contents('https://fish-text.ru/get');
    $message = json_decode($message);

    return $message->text;
}