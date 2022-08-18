<?php
require_once('../includes/db.php');
$id = $_POST['id'];


$author = '';
$book = '';
$category = '';
$isbn = '';
$price = '';

if (isset($_POST['author']) && !empty($_POST['author'])) {
    $author = $_POST['author'];
}

if (isset($_POST['book']) && !empty($_POST['book'])) {
    $book = $_POST['book'];
}

if (isset($_POST['category']) && !empty($_POST['category'])) {
    $category = $_POST['category'];
}

if (isset($_POST['isbn']) && !empty($_POST['isbn'])) {
    $isbn = $_POST['isbn'];
}

if (isset($_POST['price']) && !empty($_POST['price'])) {
    $price = $_POST['price'];
}

$sql = "UPDATE books SET author_id = '$author', book_name = '$book', category_id =
        '$category', isbn = '$isbn', price = '$price' WHERE id = '$id'";

$update = mysqli_query($connect, $sql);
header('location: index.php');
