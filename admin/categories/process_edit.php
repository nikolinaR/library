<?php 
require_once('../includes/db.php');

$name = '';

$parent_id = null;

$cat_id = '';

if(empty($_POST['parent_id']))
{
    $parent_id = null;
}
else {
    $parent_id = $_POST['parent_id'];
}


if(isset($_POST['cat_id']) && $_POST['cat_id'] != null)
{
    $cat_id = $_POST['cat_id'];
}


if(isset($_POST['name']) && $_POST['name'] != null)
{
    $name = $_POST['name'];
}
else {
    die('You must enter name');
}

if($parent_id) {

    $query = "UPDATE categories set name = '$name', parent_id = '$parent_id' WHERE id='$cat_id'";

} else {

    $query = "UPDATE categories set name = '$name' WHERE id='$cat_id'";
}



$insert = mysqli_query($connect, $query);

header('Location: /categories/');


?>