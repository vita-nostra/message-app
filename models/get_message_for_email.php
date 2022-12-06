<?php

if (isset($lastMessageId)) {

    $sql = 'SELECT
	messages.id as messages_id, messages.message as messages_message,
	users.first_name as users_first_name, users.last_name as users_last_name, users.email as users_email, 
	subjects.subject as subjects_subject
    FROM messages
    LEFT JOIN users ON users.id=messages.user_id
    LEFT JOIN subjects ON subjects.id=messages.subject_id
    WHERE messages.id = ' . $lastMessageId;
}

$messages = $pdo->prepare($sql);
$messages->execute();
$messageEmail = $messages->fetch();
