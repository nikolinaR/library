<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db.php');

$username = '';
$password = '';

$admin = validation($connect);

function validation($connect)
{

    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        die("please enter valid username");
    }

    if (isset($_POST['password']) & !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        die("Password is incorrect");
    }

    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['password'] === $password) {
        $_SESSION['admin'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        return true;
    } else {
        return false;
    }
}

if ($admin) {
    header('location: /admin/index.php');
} else {
    echo "<script>alert('Invalid credentials!');</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
}
