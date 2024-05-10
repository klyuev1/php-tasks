<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'test';

    $link = mysqli_connect($host, $user, $password, $db_name);
    
    $sel1_query = "SELECT * FROM workers WHERE id = 3";
    $sel2_query = "SELECT * FROM workers WHERE salary > 400";

    $or_and_1_query = "SELECT * FROM workers WHERE age = 27 or salary = 1000";
    $or_and_2_query = "SELECT * FROM workers WHERE age = 27 or salary != 400";

    $insert = "INSERT INTO workers (name, age, salary) VALUES ('Кирилл', 26, 300)";
    $insert_query = mysqli_query($link, $insert) or die(mysqli_error($link));
    $insert_query_test = "SELECT * FROM workers WHERE name = 'Кирилл' and age = 26";

    $delete = "DELETE FROM `workers` WHERE id = 7";
    $delete_query = mysqli_query($link, $delete) or die(mysqli_error($link));

    $update1 = "UPDATE workers SET salary=200 WHERE name='Вася'";
    $update2 = "UPDATE workers SET age=35 WHERE id=4";
    $update3 = "UPDATE workers SET salary=700 WHERE salary=500";
    $update4 = "UPDATE workers SET age=23 WHERE id > 2 and id <= 5";
    $update5 = "UPDATE workers SET name = 'Женя' , salary = 900 WHERE name = 'Вася'";

    $arr = [$sel1_query, $sel2_query, $or_and_1_query, $or_and_2_query, $insert_query_test, $update1, $update2, $update3, $update4, $update5];

    foreach($arr as $query){
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        print_r($data);
     
    }  
?>