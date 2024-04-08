<?php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $username = $data['username'];
    $password = $data['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        http_response_code(200);
        exit;
    } else {
        http_response_code(401);
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
        http_response_code(200);
        exit;
    } else {
        http_response_code(401);
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    session_destroy();
    http_response_code(200);
    exit;
}
?>