<?php

require_once "../connect.php";
require_once "../db_functions.php";

echo "\nПодождите, идет заполнение таблиц данными...\n";

$sql = "INSERT INTO subjects (subject, alias) VALUES
('Предложение о сотрудничестве', 'cooperation'),
('Жалоба на обслуживание', 'complaint'),
('Проблема с оплатой', 'payment'),
('Уточнение по заказу', 'order'),
('Другое', 'other')
";

insertData($pdo, $sql);

$sql = "INSERT INTO services (service, alias) VALUES
('Продвижение сайта', 'website-promotion'),
('Контекстная реклама', 'contextual-advertising'),
('Создание сайта', 'creating-website'),
('Веб аналитика', 'web-analytics'),
('Медийная реклама', 'display-advertising')
";

insertData($pdo, $sql);

for ($i = 0; $i < 15; $i++) {
    $user = dataGeneration();
    $sql = "INSERT INTO users (first_name, last_name, email, city) VALUES (:firstName, :lastName, :email, :city)";
    $execute = dataGeneration();
    insertData($pdo, $sql, $execute);
}

for ($i = 0; $i < 40; $i++) {
    $sql = "INSERT INTO messages (subject_id, message, user_id) VALUES (:subjectID, :message, :userID)";
    $execute = [
        'subjectID' => random_int(1, 5),
        'message' => messageGeneration(),
        'userID' => random_int(1, 15)
    ];
    insertData($pdo, $sql, $execute);
}

for ($i = 1; $i <= 40; $i++) {
    $sql = "INSERT INTO messages_services (message_id, services_id) VALUES (:messageID, :servicesID)";
    $services = random_int(0, 1);
    $services = $services ? random_int(1, 5) : null;
    $execute = [
        'messageID' => $i,
        'servicesID' => $services
    ];
    insertData($pdo, $sql, $execute);
}
echo "Данные успешно добавлены";