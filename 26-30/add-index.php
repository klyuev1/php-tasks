<?php
    function input($name){
        if(isset($_POST[$name])){
            $value = $_POST[$name];
        }else{
            $value = "";
        }
        
        return '<input name="' . $name .'" value="' . htmlspecialchars($value) .'">';
    }

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'test';

    $link = mysqli_connect($host, $user, $password, $db_name);
    
    if(!empty($_POST)){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];

        $query = "INSERT INTO workers SET name='$name', age='$age', salary='$salary'";
        mysqli_query($link, $query) or die(mysqli_error($link));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
      <?php echo input('name');?>
      <?php echo input('age');?>
      <?php echo input('salary');?>
      <input type="submit" value="добавить работника">
    </form>
</body>
</html>