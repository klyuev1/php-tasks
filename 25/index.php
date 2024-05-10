<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'test';

    $link = mysqli_connect($host, $user, $password, $db_name);
    
    $limit1 = "SELECT * FROM workers LIMIT 6";
    $limit2 = "SELECT * FROM workers LIMIT 2,3";

    $order1 = "SELECT * FROM workers ORDER BY salary ASC";
    $order2 = "SELECT * FROM workers ORDER BY salary DESC";
    $order3= "SELECT * FROM workers ORDER BY age ASC LIMIT 2,6 ";

    $count1 = "SELECT COUNT(*) as count FROM workers";
    $count2 = "SELECT COUNT(*) as count FROM workers WHERE salary = 300";

    $like1 = "SELECT * FROM pages WHERE author LIKE '%ов'";
    $like2 = "SELECT * FROM pages WHERE article LIKE '%элемент%'";
    $like3 = "SELECT * FROM workers WHERE age LIKE '3_'";
    $like4 = "SELECT * FROM workers WHERE name LIKE '%я'";

    $arr = [$limit1, $limit2, $order1, $order2, $order3, $count1, $count2, $like1, $like2, $like3,$like4];

    foreach($arr as $query){
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        print_r($data);
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
    }
?>