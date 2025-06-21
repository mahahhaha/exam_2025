<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (empty($username) || empty($password)) {
        $error = "Все поля обязательны для заполнения";
    } else {
        // Ищем пользователя в базе
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            // Устанавливаем cookie
            setcookie('user_id', $user['id'], time() + 3600 * 24 * 30, '/'); // 30 дней
            setcookie('username', $user['username'], time() + 3600 * 24 * 30, '/');
            
            // Перенаправляем на страницу приветствия
            header("Location: welcome.php");
            exit;
        } else {
            $error = "Неверное имя пользователя или пароль";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
    <h1>Авторизация</h1>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    
    <form method="post">
        <div>
            <label for="username">Имя пользователя:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Войти</button>
    </form>
    
    <p>Еще нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
</body>
</html>