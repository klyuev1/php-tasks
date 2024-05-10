<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'test';

$link = mysqli_connect($host, $user, $password, $db_name);

if (!empty($_POST['password']) && !empty($_POST['login'])) {
    $login = mysqli_real_escape_string($link, $_POST['login']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $query = "SELECT * FROM `users` WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['auth'] = true;
        header('Location: index.php');
    } else {
        echo 'Неправильный логин или пароль';
    }
}

?>

<form action="" method="POST">
    <input type="text" name='login' placeholder="Логин">
    <input type="password" name='password' placeholder="Пароль">
    <input type="submit" value='Отправить'>
</form>
