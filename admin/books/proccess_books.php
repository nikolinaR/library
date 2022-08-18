<?php
require_once('../includes/db.php');
$author = $_POST['author'];
$book = $_POST['book'];
$category = $_POST['category'];
$isbn = $_POST['isbn'];
$price = $_POST['price'];

if (isset($_POST['author'])  && !empty($_POST['author'])) {
    $author = $_POST['author'];
} else {
    echo "You must enter author";
}

if (isset($_POST['book'])  && !empty($_POST['book'])) {
    $book = $_POST['book'];
} else {
    echo "You must enter book";
}

if (isset($_POST['category'])  && !empty($_POST['category'])) {
    $category = $_POST['category'];
} else {
    echo "You must enter category";
}

if (isset($_POST['isbn'])  && !empty($_POST['isbn'])) {
    $isbn = $_POST['isbn'];
} else {
    echo "You must enter isbn";
}

if (isset($_POST['price'])  && !empty($_POST['price'])) {
    $price = $_POST['price'];
} else {
    echo "You must enter price";
}

$query = "INSERT INTO books (author_id, book_name, category_id, isbn, price) VALUES ('$author', '$book', '$category', '$isbn', '$price')";
$result = mysqli_query($connect, $query);
header('location: index.php');
