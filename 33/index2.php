<!-- 7 задача -->
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'INDEX2';

$link = mysqli_connect($host, $user, $password, $db_name);

$query1 = "SELECT p1.name AS person, p2.name AS father, p3.name AS son
            FROM people p1
            LEFT JOIN people p2 ON p1.father_id = p2.person_id
            LEFT JOIN people p3 ON p1.person_id = p3.father_id;
            ";

$query2 = "SELECT p3.name AS grandson, p2.name AS son, p1.name AS grandfather
            FROM people p1
            JOIN people p2 ON p1.person_id = p2.father_id
            JOIN people p3 ON p2.person_id = p3.father_id
            WHERE p3.name = 'Внук';
            ";

$query3 = "SELECT p4.name AS great_grandson, p3.name AS grandson, p2.name AS son, p1.name AS great_grandfather
            FROM people p1
            JOIN people p2 ON p1.person_id = p2.father_id
            JOIN people p3 ON p2.person_id = p3.father_id
            JOIN people p4 ON p3.person_id = p4.father_id
            WHERE p4.name = 'Внук';
            ";
$arr = [$query1, $query2, $query3];

foreach($arr as $query){
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    print_r($data);
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
}
?>