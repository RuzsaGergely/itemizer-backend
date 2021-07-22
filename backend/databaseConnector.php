<?php
$servername = "localhost";
$username = "itemizerbackend";
$password = "itemizerbackend";
$dbname = "itemizerbackend";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Adatbázis hiba: " . $conn->connect_error);
}

$stmt = $conn->prepare("SET NAMES 'utf8'");
$stmt->execute();