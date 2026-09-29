<?php
$host = 'localhost';
$db   = 'userdb';
$user = 'root';
$pwd = '';

try {

    $conn = mysqli_connect($host, $user, $pwd, $db);
} catch (mysqli_sql_exception $e) {
    $e . die();
}



$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
return $options;
