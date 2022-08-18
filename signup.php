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

    <!--signup form-->
    <section class="vh-100 bg-secondary">
        <div class="container h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-secondary" style="border-radius: 2rem;">
                        <div class="card-body p-5 text-center">
                            <div>
                                <form action="newuser.php" method="POST" class="form">
                                    <h2 class="fw-bold mb-5 text-uppercase text-warning">Sign Up</h2>

                                    <div class="m-3 form-floating">
                                        <input type="text" id="username" class="form-control" placeholder="Username" name="username" required/>
                                        <label for="username">Username</label>
                                    </div>

                                    <div class="m-3 form-floating">
                                        <input type="email" id="email" class="form-control" placeholder="Email" unique name="email" required/>
                                        <label for="email">Email</label>
                                    </div>

                                    <div class="m-3 form-floating">
                                        <input type="number" id="tel" class="form-control form-control-lg" placeholder="Telephone Number" name="tel" required/>
                                        <label for="tel">Telephone</label>
                                    </div>

                                    <div class="m-3 form-floating">
                                        <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" name="password" required/>
                                        <label for="password">Password</label>
                                    </div>

                                    <div class="m-3 form-floating">
                                        <input type="password" id="re_password" class="form-control form-control-lg" placeholder="Confirm Password" name="re_password" required/>
                                        <label for="re_password">Confirm Password</label>
                                    </div>

                                    <button class="btn btn-warning btn-lg m-2" type="submit">Sign Up</button>
                                </form>
                            </div>

                        </div>
                        <p class="small text-center">Have an account? <a href="login.php">Log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>