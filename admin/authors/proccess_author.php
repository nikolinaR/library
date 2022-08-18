<?php
require_once('../includes/db.php');

$author = $_POST['author'];

if (isset($_POST['author']) && !empty($_POST['author'])) {
    $author = $_POST['author'];
} else {
    die("you must enter author name");
}

$sql = "INSERT INTO authors (author_name) VALUES ('$author')";
$insert = mysqli_query($connect, $sql);
header('location: index.php');
