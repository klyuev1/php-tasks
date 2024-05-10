<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>age</th>
        <th>salary</th>
        <th>delete</th>
        <th>edit</th>
    </tr>
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'test';

    $link = mysqli_connect($host, $user, $password, $db_name);

    function input($name)
    { {
            if (isset($_POST[$name])) {
                $value = $_POST[$name];
            } else {
                $value = "";
            }
        }
        return '<input name="' . $name . '" value="' . $value . '">';
    }

    if (!empty($_POST)) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];

        $query = "INSERT INTO workers SET name='$name', age='$age', salary='$salary'";
        mysqli_query($link, $query) or die(mysqli_error($link));
    }

    if (isset($_GET['del'])) {
        $del = $_GET['del'];
        $query = "DELETE FROM workers WHERE id=$del";
        mysqli_query($link, $query) or die(mysqli_error($link));
    }

    if (isset($_GET['edit'])) {
        header('Location: edit.php');
    }
    $query = "SELECT * FROM workers";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row)
        ;
    $result = '';
    foreach ($data as $elem) {
        $result .= '<tr>';
        $result .= '<td>' . $elem['id'] . '</td>';
        $result .= '<td>' . $elem['name'] . '</td>';
        $result .= '<td>' . $elem['age'] . '</td>';
        $result .= '<td>' . $elem['salary'] . '</td>';
        $result .= '<td><a href="?del=' . $elem['id'] . '"> Удалить </a></td>';
        $result .= '<td><a href="edit.php?id=' . $elem['id'] . '"> Редактировать </a></td>';
        $result .= '</tr>';
    }
    echo $result;
    ?>
</table>
<form action="" method="POST">
    <?php echo input('name'); ?>
    <?php echo input('age'); ?>
    <?php echo input('salary'); ?>
    <input type="submit" value="Добавить worker">
</form>