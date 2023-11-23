<?php

$server = 'localhost:3307';
$username = 'root';
$password = '2550-2550';
$database = 'MonkeyAdoption_database';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

?>