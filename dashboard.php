<!DOCTYPE html>
<html>

<head>
    <title>Online Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.css">
</head>

<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-5 fixed-top">
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
    <?php session_start();
    include_once('conn.php');

    $id = $_SESSION['id'];
    $notretr = "SELECT id, user_id, return_status FROM issuebook 
    where return_status = 0 and user_id=" . $id;
    $query = mysqli_query($connect, $notretr);
    $notreturned = mysqli_num_rows($query);

    $issued = "SELECT id FROM issuebook where user_id=" . $id;
    $sql = mysqli_query($connect, $issued);
    $issued = mysqli_num_rows($sql);
    ?>
    <div class="container mt-5">
        <p class="display-6 text-muted pt-5 ">User Home</p>
        <hr>
    </div>
    <div class="container my-5 ">
        <div class="row  d-flex justify-content-center align-items-center">
            <div class="col-sm-12  col-lg-4">
                <div class="card m-3 text-dark" style="width: 20rem;">
                    <div class="row g-0">
                        <div class="col-md-4 bg-warning d-flex justify-content-center align-items-center">
                            <i class="material-icons" style="font-size: 40px;">library_books</i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body text-end">
                                <h5 class="card-title">Issued Books</h5>
                                <p class="card-text lead "><?php echo $issued; ?></p>
                                <p class="card-text">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card m-3 text-dark" style="width: 20rem;">
                    <div class="row g-0">
                        <div class="col-md-4  bg-danger d-flex justify-content-center align-items-center">
                            <span class="material-icons" style="font-size: 40px;">event_busy</span>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body text-end">
                                <h5 class="card-title">Not Returned</h5>
                                <p class="card-text lead "><?php echo $notreturned; ?></p>
                                <p class="card-text">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row d-flex justify-content-around align-items-center">
            <img src=" https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1890&q=80 " alt="" style="height: 50vh;" width="100%">
        </div>
    </div>
    <script src="/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>