<?php
require_once('../includes/db.php');

$id = $_GET['id'];
$query = "DELETE FROM authors WHERE id=" . $id;
$delete = mysqli_query($connect, $query);
header('location: index.php');
?>