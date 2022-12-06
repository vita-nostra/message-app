<?php

require_once "config.php";

try {
    $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbName, $userName, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}