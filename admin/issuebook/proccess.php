<?php
require_once('../includes/db.php');

$book = $_POST['book'];
$user = $_POST['user'];
$status = 0;
if (isset($_POST['book']) && !empty($_POST['book'])) {
    $book = $_POST['book'];
} else {
    echo "You must select a book";
}

if (isset($_POST['user']) && !empty($_POST['user'])) {
    $user = $_POST['user'];
} else {
    echo "You must select user";
}

$query = "INSERT INTO issuebook (book_id, user_id, return_status) VALUES ('$book', '$user', '$status')";
$result = mysqli_query($connect, $query);
header('location: index.php');
