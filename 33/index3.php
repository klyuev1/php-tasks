<!-- 12 задача -->
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'INDEX3';

$link = mysqli_connect($host, $user, $password, $db_name);

$query1 = "SELECT u.username, i.interest_name
            FROM users u
            JOIN user_interests ui ON u.user_id = ui.user_id
            JOIN interests i ON ui.interest_id = i.interest_id
            WHERE u.username = 'Alice';";

$query2 = "SELECT u.username, i.interest_name
            FROM users u
            JOIN user_interests ui ON u.user_id = ui.user_id
            JOIN interests i ON ui.interest_id = i.interest_id
            WHERE i.interest_name = 'Интерес1';";

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