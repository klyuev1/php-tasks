<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>salary</th>
            <th>delete</th>
        </tr>
        <?php
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $db_name = 'test';

            $link = mysqli_connect($host, $user, $password, $db_name);
            
            if(isset($_GET['del'])){
                $del = $_GET['del'];
                $query = "DELETE FROM workers WHERE id=$del";
                mysqli_query($link, $query) or die(mysqli_error($link));
            }

            $query = "SELECT * FROM workers";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

            $result = '';
            include('add.php'); 
            foreach($data as $elem){
                $result .= '<tr>';
                $result .= '<td>' . $elem['id'] .'</td>';
                $result .= '<td>' . $elem['name'] .'</td>';
                $result .= '<td>' . $elem['age'] .'</td>';
                $result .= '<td>' . $elem['salary'] .'</td>';
                $result .= '<td><a href="?del=' . $elem['id'] .'">удалить</a></td>';

                $result .= '</tr>';
            }
            echo $result;
        ?>
    </table>
</body>
</html>