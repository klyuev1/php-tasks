<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'test';

$link = mysqli_connect($host, $user, $password, $db_name);

function input($name)
{
    if (isset($_POST[$name])) {
        $value = $_POST[$name];
    } else {
        $value = "";
    }
    return '<input name="' . $name . '" value="' . $value . '">';
}

// Проверяем наличие параметра "id"
if (!isset($_GET['id'])) {
    // Если параметр "id" отсутствует, создаем новую запись
    if (!empty($_POST)) {
        $name = $_POST['name_edit'];
        $age = $_POST['age_edit'];
        $salary = $_POST['salary_edit'];
        $query = "INSERT INTO `workers` (name, age, salary) VALUES ('$name', '$age', '$salary')";
        mysqli_query($link, $query) or die(mysqli_error($link));
        // После создания новой записи перенаправляем пользователя на страницу редактирования этой записи
        header("Location: edit.php?id=" . mysqli_insert_id($link));
        exit; // Прерываем выполнение скрипта после перенаправления пользователя
    }
    // Если параметр "id" не указан и нет данных POST запроса, просто завершаем выполнение скрипта
    exit;
}

// Если параметр "id" передан, обрабатываем запрос на редактирование существующей записи
$id = $_GET['id'];

if (!empty($_POST)) {
    $name = $_POST['name_edit'];
    $age = $_POST['age_edit'];
    $salary = $_POST['salary_edit'];
    $query = "UPDATE `workers` SET name = '$name', age = '$age', salary = '$salary' WHERE `workers`.`id` = '$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));
}

$query = "SELECT * FROM workers WHERE id = $id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$data = mysqli_fetch_assoc($result);
?>

<form action="" method="POST">
    <?php echo input('name_edit'); ?>
    <?php echo input('age_edit'); ?>
    <?php echo input('salary_edit'); ?>
    <input type="submit" value="Принять изменения">
</form>

<a href="index.php">Вернуться назад</a>
