<?php
session_start();

require __DIR__ . '/dbh.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors = [];
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pwd   = $_POST['pwd'] ?? '';

    if ($name === '') {
        echo 'Name is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'A valid email is required';
    } elseif (strlen($pwd) < 8) {
        echo 'Password must be at least 8 characters';
    } else {

        // $scrambled = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, pwd) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $pwd);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Registration successful!';
            header("Location: ../index.php");
            die();
        } else {
            echo 'Sorry, it could not be saved.';
            header("Location: ../index.php");
            die();
        }
    }
} else {
    header("http://localhost/web-p-main/index.php");
    exit();
}
