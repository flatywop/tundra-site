<?php
$host = "sql202.infinityfree.com";
$dbname = "if0_41409283_orders";
$username = "if0_41409283";
$password = "9X94UfJy7jcO";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения к базе");
}

$conn->set_charset("utf8mb4");
?>