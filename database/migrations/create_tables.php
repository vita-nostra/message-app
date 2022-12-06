<?php

require_once "../connect.php";
require_once "../db_functions.php";

$sql = "CREATE TABLE subjects(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    subject VARCHAR(255) NOT NULL,
    alias VARCHAR(255) NOT NULL UNIQUE
)";

createTable($pdo, $sql, 'subjects');

$sql = "CREATE TABLE services(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    service VARCHAR(255) NOT NULL,
    alias VARCHAR(255) NOT NULL UNIQUE
)";

createTable($pdo, $sql, 'services');

$sql = "CREATE TABLE users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    city VARCHAR(70) NOT NULL
)";

createTable($pdo, $sql, 'users');

$sql = "CREATE TABLE messages(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    file VARCHAR(255),
    subject_id INT NOT NULL,
    message TEXT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id)  REFERENCES users (id),
    FOREIGN KEY (subject_id)  REFERENCES subjects (id)
)";

createTable($pdo, $sql, 'messages');

$sql = "CREATE TABLE messages_services(
    message_id INT NOT NULL,
    services_id INT,
    FOREIGN KEY (message_id)  REFERENCES messages (id),
    FOREIGN KEY (services_id)  REFERENCES services (id)
)";

createTable($pdo, $sql, 'messages_services');