<?php
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode([
        "success" => false,
        "message" => "Нет данных"
    ]);
    exit;
}

$name = trim($data["name"] ?? "");
$phone = trim($data["phone"] ?? "");

if ($name === "" || $phone === "") {
    echo json_encode([
        "success" => false,
        "message" => "Пустые поля"
    ]);
    exit;
}

$host = "sql202.infinityfree.com";
$dbname = "if0_41409283_orders";
$username = "if0_41409283";
$password = "9X94UfJy7jcO";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode([
        "success" => false,
        "message" => "Ошибка подключения к базе: " . mysqli_connect_error()
    ]);
    exit;
}

$conn->set_charset("utf8");

$stmt = $conn->prepare("INSERT INTO orders (name, phone) VALUES (?, ?)");

if (!$stmt) {
    echo json_encode([
        "success" => false,
        "message" => "Ошибка подготовки запроса: " . $conn->error
    ]);
    exit;
}

$stmt->bind_param("ss", $name, $phone);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Заявка сохранена"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Ошибка записи в базу: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>