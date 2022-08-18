<!DOCTYPE html>
<html>

<head>
    <title>Admin Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/admin/style_admin.css">
</head>

<body class="bg-light">
    <!--top header -->
    <header class="navbar navbar-dark bg-dark bg-gradient sticky-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Online Library</a>

            <div>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a href="/admin/login.php" class="nav-link btn ">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- sidebar -->
    <div class="sidebar-container bg-dark bg-gradient ">
        <div class="sidebar-logo">
            Admin Dashboard
        </div>
        <ul class="sidebar-navigation list-unstyled">
            <li><a href="/admin/index.php"><i class="bi bi-house"></i>Home</a></li>
            <li><a href="/admin/books/index.php"><i class="bi bi-book"></i>Books</a></li>
            <li><a href="/admin/authors/index.php"><i class="bi bi-person-square"></i>Authors</a></li>
            <li><a href="/admin/categories/index.php"><i class="bi bi-list-nested"></i>Genres</a></li>
            <li><a href="/admin/users/index.php"><i class="bi bi-people"></i>Reg Users</a></li>
            <li><a href="/admin/issuebook/index.php"><i class="bi bi-card-checklist"></i>Issued Book</a></li>
        </ul>
    </div>


    <!-- main content outside sidebar-->
    <div class="content-container">
        <div class="container">