<?php
$host = 'localhost';
$db   = 'userdb';
$user = 'root';
$password  = '';


try {
    $conn = mysqli_connect($host, $user, $password, $db);

    if (!$conn) {
        throw new mysqli_sql_exception('Connection failed');
    }
} catch (mysqli_sql_exception $e) {
    error_log('DB error: ' . $e->getMessage());
    die('Database connection failed.');
}
// return $conn;
