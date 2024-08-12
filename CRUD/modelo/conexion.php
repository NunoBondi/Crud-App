<?php


$host = "localhost";
$user = "root";
$password = "";
$db = "registro";


try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    $conn = false;
}
