<?php 
$hostname = "localhost";
$username = "root";
$database = "php";
$password = "root";

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>