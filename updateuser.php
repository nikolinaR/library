<?php session_start();
include_once('conn.php');

$id = $_SESSION['id'];
$sql = "SELECT * FROM users where id=" . $id;
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $username = '';
    $email = '';
    $telephone = '';

    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['telephone']) && !empty($_POST['telephone'])) {
        $telephone = $_POST['telephone'];
    }

    $sqlq = "UPDATE users SET username = '$username', email = '$email', telephone = '$telephone'
WHERE id=" . $_SESSION['id'];
    $edit = mysqli_query($connect, $sqlq);
    $_SESSION['msg'] = "Profile updated successfully";

    header('location: user_profile.php');
}
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

<body class="d-flex flex-column h-100">

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
        <p class="text-muted pt-5">Edit Profile</p>
        <a href="user_profile.php" class="btn btn-outline-dark">Back</a>
        <hr>
    </div>
    <div class="container vh-100">
        <div class="row m-5  d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">Edit Profile</div>
                    <div class="card-body">
                        <form action="" role="form" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
                            <div class="form-group row  mb-3 p-2">
                                <div class="col-md-6">
                                    <label for="username" class="col-form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="<?php echo $row['username']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row  mb-3 p-2">
                                <div class="col-md-6">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row  mb-3 p-2">
                                <div class="col-md-6">
                                    <label for="telephone" class="col-form-label">Phone</label>
                                    <input type="number" name="telephone" class="form-control" id="telephone" value="<?php echo $row['telephone']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button type="submit" name="update" class="m-3 col-3 btn btn-warning text-center">
                                    Edit
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