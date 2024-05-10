<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if (!empty($_SESSION['auth'])) {
        echo 'Вы авторизованы';
    } else {
        echo 'Вы не авторизованы';
    }
    ?>
    <br>
    <a href="login.php">Авторизоваться</a>
</body>
</html>