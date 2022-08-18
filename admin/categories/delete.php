<?php 
require_once('../includes/db.php');

$cat_id = '';


if (isset($_GET['cat_id']) && $_GET['cat_id'] != null) {
    $cat_id = $_GET['cat_id'];
}


$query = "DELETE FROM categories WHERE id='$cat_id'";

$dbdelete = mysqli_query($connect, $query);

header('location: index.php');
