<?php

session_start();
ob_start();

$host = "localhost";
$user = "root";
$pw = "";
$dbname = "datablog";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
include 'class_user.php';

$db = new Main($conn);
?>