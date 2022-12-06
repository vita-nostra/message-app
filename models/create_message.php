<?php

require_once '../services/save_file.php';

if (!empty($_POST) && isset($_GET['add'])) {
    $sql = "SELECT `id` FROM users WHERE `email` = :email";
    $insertData = [
        'email' => $_POST['email']
    ];
    $userID = selectID($pdo, $sql, $insertData);

    if (empty($userID)) {
        $sql = "INSERT INTO users (first_name, last_name, email, city) VALUES (:first_name, :last_name, :email, :city)";
        $insertData = [
            'first_name' => $_POST['firstName'],
            'last_name' => $_POST['lastName'],
            'email' => $_POST['email'],
            'city' => $_POST['city']
        ];
        insertData($pdo, $sql, $insertData);
        $userID = $pdo->lastInsertId();
    }

    $sql = "SELECT `id` FROM subjects WHERE `alias` = :alias";
    $insertData = [
        'alias' => $_POST['subject']
    ];
    $subjectID = selectID($pdo, $sql, $insertData);

    $sql = "INSERT INTO messages (file, subject_id, message, user_id) VALUES (:file, :subject_id, :message, :user_id)";
    $insertData = [
        'file' => $filePath,
        'subject_id' => $subjectID,
        'message' => $_POST['reviewText'],
        'user_id' => $userID
    ];
    insertData($pdo, $sql, $insertData);
    $lastMessageId = $pdo->lastInsertId();

    if (!empty($_POST['services'])) {
        foreach ($_POST['services'] as $service) {
            $sql = "SELECT `id` FROM services WHERE `alias` = :alias";
            $insertData = [
                'alias' => $service
            ];
            $servicesID = selectID($pdo, $sql, $insertData);

            $sql = "INSERT INTO messages_services (message_id, services_id) VALUES (:message_id, :services_id)";
            $insertData = [
                'message_id' => $lastMessageId,
                'services_id' => $servicesID
            ];
            insertData($pdo, $sql, $insertData);
        }
    } else {
        $sql = "INSERT INTO messages_services (message_id, services_id) VALUES (:message_id, :services_id)";
        $insertData = [
            'message_id' => $lastMessageId,
            'services_id' => null
        ];
        insertData($pdo, $sql, $insertData);
    }

    include 'get_message_for_email.php';
    include '../services/send_email.php';
    header("Location: " . $_SERVER['PHP_SELF']);
}
