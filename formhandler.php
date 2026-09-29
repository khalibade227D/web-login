<?php
$options = require 'dbc.php';
var_dump($options);
$errors = [];
$name  = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$pwd   = $_POST['pwd'] ?? '';

if ($name === '' || strlen($name) > 100) {
    $errors[] = 'Name is required and must be at most 100 characters.';
}
if ($email === '' || strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email is required (max 100 chars).';
}
if ($pwd === '' || strlen($pwd) > 255) {
    $errors[] = 'Password is required (max 255 chars).';
}

if (!empty($errors)) {
    foreach ($errors as $e) echo "<p style='color:red;'>$e</p>";
    exit;
}

$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
