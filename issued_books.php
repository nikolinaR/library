<?php session_start();
include_once('conn.php');
$id = $_SESSION['id'];
$sql = "SELECT issuebook.id, users.username, books.book_name,
issuebook.issue_date, issuebook.return_date, issuebook.return_status
 FROM issuebook
 join books on issuebook.book_id=books.id
 join users on issuebook.user_id=users.id where issuebook.user_id=" . $id;
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html>
<title>Online Library</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.css">

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
        <p class="display-6 text-muted pt-5 ">Issued Books</p>
        <hr>
    </div>
    <div class="container  m-5 vh-100">
        <div class="row   d-flex justify-content-center align-items-center">
            <div class="col-8 p-3 justify-content-center">
                <table class="table align-middle">
                    <thead class="bg-warning">
                        <tr>
                            <th>Book Name</th>
                            <th>Issue Date</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                <td>' . $row['book_name'] . '</td>';
                            echo '<td>' . $row['issue_date'] . '</td>';
                        ?>
                            <td><?php
                                ($row['return_status'] == 1) ? print $row['return_date'] : print "Not returned yet";
                                ?></td>
                        <?php echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>