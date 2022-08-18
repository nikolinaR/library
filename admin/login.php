<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.css">
    <title>Online Library</title>
</head>

<body>
    <!--login form-->
    <section class="vh-100 bg-dark bg-gradient">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 ">
                                <h2 class="fw-bold mb-2 text-uppercase text-warning">Admin Login</h2>
                                <form action="admin_validate.php" method="POST">
                                    <p class="text-muted mb-5">Please enter your username and password!</p>
                                    <div class="form-outline form-white m-3 p-2 form-floating">
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username" />
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="form-outline form-white m-3 p-2 form-floating">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <p class="small mb-5 pb-lg-2"><a class="text-muted " href="#!">Forgot password?</a></p>
                                    <button class="btn btn-outline-warning btn-lg px-5" type="submit">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>