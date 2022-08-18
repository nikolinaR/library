<?php session_start();
$connect = mysqli_connect('127.0.0.1', 'root', '', 'librarydb') or
    die("Mysqli connect error " . mysqli_connect_error());


if (!isset($_SESSION['username'])) {
    $_SESSION['admin'];
    header('location: /admin/login');
} else {
    $_SESSION['admin'];
}
