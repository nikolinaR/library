<?php session_start();

include_once('conn.php');

$username = $_POST['username'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$status = 1;

if (isset($_POST['username']) && !empty($_POST['username'])) {
    $username = $_POST['username'];
} else {
    die("you must enter a username");
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "email adress is taken";
    }
} else {
    echo "you must enter a email";
}


if (isset($_POST['tel']) && !empty($_POST['tel'])) {
    $tel = $_POST['tel'];
}

if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['re_password']) && !empty($_POST['re_password'])) {
    $re_password = $_POST['re_password'];
}

$number = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);
if (!$number || !$specialChars || strlen($password) < 6) {
    echo 'Password should be at least 6 characters and should include at least one number and one special character.';
} elseif ($password !== $re_password) {
    echo "paswword doesn't match";
} else {
    $sql = "INSERT INTO users (username, email, password, telephone, status) VALUES ('$username', '$email', '" . md5($password) . "','$tel', '$status')";
    $insert = mysqli_query($connect, $sql);
    header('location: login.php');
}
