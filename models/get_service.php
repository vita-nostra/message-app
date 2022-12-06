<?php

$services = $pdo->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC);
