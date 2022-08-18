<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Online Library</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="vh-100 bg-secondary">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-6 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-secondary" style="border-radius: 2rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 ">
                                
                                    <!--login form-->
                                <form action="validate.php" method="POST">
                                    <h2 class="fw-bold mb-2 text-uppercase text-warning">Login</h2>
                                    <p class=" mb-5">Please enter your email and password!</p>
                                    <input type="hidden" class="form-control form-control-lg" name="status" />

                                    <div class="form-outline form-white m-3 p-2 form-floating">
                                        <input type="email" id="email" class="form-control form-control-lg" placeholder="Email" name="email" />
                                        <label for="email">Email</label>
                                    </div>

                                    <div class="form-outline form-white m-3 p-2 form-floating">
                                        <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" name="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <p class="small mb-5 pb-lg-2"><a class="text-muted " href="#!">Forgot password?</a></p>
                                    <button class="btn btn-warning btn-lg px-5" type="submit">Login</button>
                                </form>
                            </div>
                            <p>Not registered yet?
                                <a class="link-danger" href="signup.php">Sign Up</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>







    <script src="/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>