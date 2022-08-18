<?php session_start();
include_once('conn.php');
$email = '';
$password = '';
$status ='';
$user = validation($connect);
function validation($connect) {

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    }

    if (isset($_POST['status']) && !empty($_POST['status'])) {
        $status = $_POST['status'];
    }

    $sql = "SELECT id, email, password, status FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row['status'] == 1) {
     die("Your account is blocked");
    }
    if ($row['password'] === md5($password)) {
        $_SESSION['user'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        return true;
    } else {
        return false;
    }


}
if ($user) {
   header('location: dashboard.php');
} else {
    echo "Invalid credentials";
}