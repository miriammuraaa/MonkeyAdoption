<?php

$server = 'localhost';
$username = 'root';
$password = '2550-2550';
$database = 'monkeyadoption_database';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

?>