<?php
require_once('../includes/db.php');
$id = $_GET['id'];
$sql = "DELETE FROM books WHERE id=" . $id;
$delete = mysqli_query($connect, $sql);
header('location: index.php');

