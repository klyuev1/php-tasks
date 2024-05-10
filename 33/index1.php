<!-- 3 задача -->
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'INDEX1';

$link = mysqli_connect($host, $user, $password, $db_name);

$query1 = "SELECT
        p.product_name,
        c.category_name,
        w.warehouse_name,
        b.brand_name
        FROM products p
        JOIN categories c ON p.category_id = c.category_id
        JOIN warehouses w ON p.warehouse_id = w.warehouse_id
        JOIN brands b ON p.brand_id = b.brand_id;
        ";

$query2 = "SELECT * FROM warehouses";
$arr = [$query1, $query2];

foreach($arr as $query){
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    print_r($data);
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
}
?>