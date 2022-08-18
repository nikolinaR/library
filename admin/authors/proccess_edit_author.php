<?php
require_once('../includes/db.php');
require_once('../includes/header.php');
$id = $_POST['id'];
$author = '';

if (isset($_POST['author']) && !empty($_POST['author'])) {
    $author = $_POST['author'];
}

$query = "UPDATE authors SET author_name = '$author' WHERE id='$id'";
$update = mysqli_query($connect, $query);
header('location: index.php');
