<?php

require_once '../configs/app.php';

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$firstMessage = ($messagesToPage * $currentPage) - $messagesToPage;

$sql = 'SELECT
	messages.id as messages_id, messages.message as messages_message, messages.file as messages_file,
	users.first_name as users_first_name, users.last_name as users_last_name, users.email as users_email, 
	users.city as users_city, subjects.subject as subjects_subject, GROUP_CONCAT(services.service) AS messages_service
    FROM messages
    LEFT JOIN users ON users.id=messages.user_id
    LEFT JOIN subjects ON subjects.id=messages.subject_id
    INNER JOIN messages_services ON messages.id = messages_services.message_id
    LEFT JOIN services ON messages_services.services_id = services.id                     
    GROUP BY messages.id ORDER BY messages.id DESC LIMIT ' . $firstMessage . ', ' . $messagesToPage;

$messages = $pdo->prepare($sql);
$messages->execute();
$messagesList = $messages->fetchAll();

$query = $pdo->query("SELECT COUNT(*) FROM messages");
$query->setFetchMode(PDO::FETCH_ASSOC);
$row = $query->fetch();
$totalMessages = $row['COUNT(*)'];

$pages = ceil($totalMessages / $messagesToPage);
