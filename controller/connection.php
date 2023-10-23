<?php

$server = 'localhost';
$user = 'root';
$pass = '123456';
$db = 'world';

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die('err, ');
}

echo 'conectado';
mysqli_close($conn);

?>