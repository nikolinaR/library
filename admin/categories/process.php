<?php 
require_once('../includes/db.php');



$name = '';

$parent_id = null;


if(empty($_POST['parent_id']))
{
    $parent_id = null;
}
else {
    $parent_id = $_POST['parent_id'];
}


if(isset($_POST['name']) && $_POST['name'] != null)
{
    $name = $_POST['name'];
}
else {
    die('You must enter name');
}

if($parent_id) {
    $query = "INSERT INTO categories (name, parent_id) VALUES ('$name', '$parent_id')";
} else {
    $query = "INSERT INTO categories (name) VALUES ('$name')";
}



$insert = mysqli_query($connect, $query);



header('location: index.php');



?>




