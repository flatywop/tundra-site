<?php
require_once "db.php";

$result = $conn->query("SELECT * FROM products WHERE id = 1");
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"] ?? "";
    $subtitle = $_POST["subtitle"] ?? "";
    $current_price = $_POST["current_price"] ?? "";
    $old_price = $_POST["old_price"] ?? "";
    $discount = $_POST["discount"] ?? "";
    $width_value = $_POST["width_value"] ?? "";
    $torque_value = $_POST["torque_value"] ?? "";
    $distance_value = $_POST["distance_value"] ?? "";
    $about_title = $_POST["about_title"] ?? "";
    $about_text = $_POST["about_text"] ?? "";

    $stmt = $conn->prepare("
        UPDATE products
        SET title=?, subtitle=?, current_price=?, old_price=?, discount=?,
            width_value=?, torque_value=?, distance_value=?, about_title=?, about_text=?
        WHERE id=1
    ");

    $stmt->bind_param(
        "ssssssssss",
        $title,
        $subtitle,
        $current_price,
        $old_price,
        $discount,
        $width_value,
        $torque_value,
        $distance_value,
        $about_title,
        $about_text
    );

    $stmt->execute();

    header("Location: admin.php?saved=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Админка товара</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 900px;
      margin: 40px auto;
      padding: 0 20px;
      background: #f7f7f7;
    }
    h1 {
      margin-bottom: 24px;
    }
    form {
      background: #fff;
      padding: 24px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    }
    label {
      display: block;
      margin-bottom: 16px;
      font-weight: bold;
    }
    input, textarea {
      width: 100%;
      margin-top: 6px;
      padding: 10px 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
    }
    textarea {
      min-height: 120px;
      resize: vertical;
    }
    button {
      background: #71EE25;
      border: none;
      padding: 12px 20px;
      border-radius: 999px;
      font-weight: bold;
      cursor: pointer;
    }
    .ok {
      margin-bottom: 16px;
      color: green;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h1>Админка товара</h1>

  <?php if (isset($_GET["saved"])): ?>
    <div class="ok">Изменения сохранены</div>
  <?php endif; ?>

  <form method="post">
    <label>Подзаголовок
      <input type="text" name="subtitle" value="<?= htmlspecialchars($product["subtitle"]) ?>">
    </label>

    <label>Название
      <input type="text" name="title" value="<?= htmlspecialchars($product["title"]) ?>">
    </label>

    <label>Текущая цена
      <input type="text" name="current_price" value="<?= htmlspecialchars($product["current_price"]) ?>">
    </label>

    <label>Старая цена
      <input type="text" name="old_price" value="<?= htmlspecialchars($product["old_price"]) ?>">
    </label>

    <label>Скидка
      <input type="text" name="discount" value="<?= htmlspecialchars($product["discount"]) ?>">
    </label>

    <label>Ширина захвата
      <input type="text" name="width_value" value="<?= htmlspecialchars($product["width_value"]) ?>">
    </label>

    <label>Крутящий момент
      <input type="text" name="torque_value" value="<?= htmlspecialchars($product["torque_value"]) ?>">
    </label>

    <label>Дальность выброса
      <input type="text" name="distance_value" value="<?= htmlspecialchars($product["distance_value"]) ?>">
    </label>

    <label>Заголовок блока "О товаре"
      <input type="text" name="about_title" value="<?= htmlspecialchars($product["about_title"]) ?>">
    </label>

    <label>Описание
      <textarea name="about_text"><?= htmlspecialchars($product["about_text"]) ?></textarea>
    </label>

    <button type="submit">Сохранить</button>
  </form>
</body>
</html>