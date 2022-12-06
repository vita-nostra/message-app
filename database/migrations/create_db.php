<?php

include '../config.php';

try {
    $dbh = new PDO("mysql:host=$host", $userName, $password);

    $dbh->exec("CREATE DATABASE `$dbName`;")
    or die(print_r($dbh->errorInfo(), true));

}
catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}

require_once "create_tables.php";
require_once "insert_data.php";