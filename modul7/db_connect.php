<?php
$host = "localhost";
$dbname = "modul7";     // ny database
$username = "root";     // XAMPP standard
$password = "";         // XAMPP standard uten passord

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Viser hva feilen er hvis tilkobling til database har feilet
    die("Database-tilkobling feilet: " . $e->getMessage());
}
