<?php

session_start();
$conn = "";

try {
    $servername = "localhost";
    $dbname = "pai1";
    $username = "root";
    $password = "";

    $conn = new PDO(
        "mysql:host=$servername; dbname=pai1",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
