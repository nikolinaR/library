<?php
session_start();
error_reporting(0);
include_once('conn.php');
$query = 'SELECT * FROM users WHERE users.id="' . $_SESSION['id'] . '" ';
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Online Library</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column">
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

    <div class="container mt-5">
        <p class="display-6 text-muted pt-5 ">My Profile</p>
        <hr>
    </div>
    <?php if ($_SESSION['msg'] != "") { ?>
        <div class="col-md-6">
            <div class="alert alert-success">
                <strong>Success :</strong>
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
            </div>
        </div>
    <?php } ?>

    <div class="container p-5  vh-100">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-8  justify-content-center">
                <div class="">
                    <hr>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Username:</th>
                                <td><?php echo $row['username']; ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Telephone:</th>
                                <td><?php echo $row['telephone']; ?></td>
                            </tr>
                            <tr>
                                <th>Registration date:</th>
                                <td><?php echo $row['registration_date']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <a href="updateuser.php" class="btn btn-warning">Update Profile</a>
                        <a href="changePass.php" class="link-primary">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>