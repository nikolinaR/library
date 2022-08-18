<?php session_start();
error_reporting(0);

include_once('conn.php');
$id = $_SESSION['id'];
$select = "SELECT * FROM users WHERE id=" . $id;
$sql = mysqli_query($connect, $select);
while ($row = mysqli_fetch_array($sql)) {
    $old = $row['password'];
    global $old;
}
if (isset($_POST['submit'])) {

    $currentpass = $_POST['currentpass'];
    $newpassword = $_POST['newpassword'];
    $confirmpass = $_POST['confirmpass'];

    if (!empty($_POST['currentpass'])) {
        $currentpass = md5($_POST['currentpass']);
    } else {
        die("currentpass");
    }
    if (!empty($_POST['newpassword'])) {
        $newpassword = $_POST['newpassword'];
    } else {
        die("newpassword");
    }
    if (!empty($_POST['confirmpass'])) {
        $confirmpass = $_POST['confirmpass'];
    } else {
        echo "confirmpass";
    }

    if ($old !== $currentpass) {
        $oldpass = "Your old password is not correct!";
    } elseif ($newpassword !== $confirmpass) {
        $confirm = "Password doest match";
    } else {
        $query = "UPDATE users SET password ='" . md5($newpassword) . "'  WHERE id=" . $id;
        $result = mysqli_query($connect, $query);
        $success = "Your password is changed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Online Library</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Online Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbartoggler" aria-controls="navbartoggler" aria-expanded="false" aria-label="toggleNavigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbartoggler">
                <ul class="navbar-nav ms-auto  navbar-dark bg-success ">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="user_profile.php" class="nav-link">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="issued_books.php" class="nav-link">Issued Books</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-4">
        <p class="text-muted pt-5">Change password</p>
        <a href="user_profile.php" class="btn btn-outline-dark">Back</a>
        <hr>
    </div>
    <?php
    if ($confirm) { ?><div class="alert alert-danger"><strong>ERROR:</strong>:<?php echo htmlentities($confirm); ?> </div><?php }
                                                                                                                        if ($oldpass) { ?><div class="alert alert-danger"><strong>ERROR</strong>:<?php echo htmlentities($oldpass); ?> </div><?php } else if ($success) { ?><div class="alert alert-success"><strong>SUCCESS:</strong>:<?php echo htmlentities($success); ?> </div><?php } ?>
    <div class="container vh-100">
        <div class="row m-5  d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">Change password</div>
                    <div class="card-body">
                        <form action="" role="form" method="post">
                            <input type="hidden" name="id"> <!-- tuka mora da ima id vo formata za da go zemi posle proccess id-to -->
                            <div class="form-group row  mb-3 p-2">
                                <div class="col-md-6">
                                    <label for="currentpass" class="col-form-label">Enter Your Password</label>
                                    <input type="password" name="currentpass" class="form-control" id="currentpass">
                                </div>
                            </div>
                            <div class="form-group row  mb-3 p-2">
                                <div class="col-md-6">
                                    <label for="newpassword" class="col-form-label">new Password</label>
                                    <input type="password" name="newpassword" class="form-control" id="newpassword">
                                </div>
                            </div>
                            <div class="form-group row  mb-3 p-2">
                                <div class="col-md-6">
                                    <label for="confirmpass" class="col-form-label">Confirm Password</label>
                                    <input type="password" name="confirmpass" class="form-control" id="confirmpass">
                                </div>
                            </div>
                            <div class="form-group row">
                                <button type="submit" name="submit" class="m-3 col-3 btn btn-danger text-center">
                                    Change password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>