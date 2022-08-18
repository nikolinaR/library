<?php
require_once('../includes/db.php');
require_once('../includes/header.php');

$users = "SELECT id, username, status FROM users";
$usersq = mysqli_query($connect, $users);

$books = "SELECT * FROM books";
$bookssql = mysqli_query($connect, $books);

?>
<a href="index.php" class="btn btn-outline-dark"><i class="bi bi-caret-left-fill"></i> Back</a>
<strong>Issue new book</strong>

<section class="m-5">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning ">Edit author</div>
                    <div class="card-body">
                        <form action="proccess.php" method="POST" class="text-muted text-start">
                            <div class="row mb-3 p-2 justify-content-center text-center">
                                <div class="col-6">
                                    <label for="book" class="col-form-label">Select Book</label>
                                    <select id="book" class="form-control form-select text-muted" name="book">
                                        <option value="">Books</option>
                                        <?php
                                        while ($select = mysqli_fetch_array($bookssql)) {
                                            echo '<option value="' . $select[id] . '">' . $select[book_name] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 p-2 justify-content-center text-center">
                                <div class="col-6">
                                    <label for="user" class="col-form-label">Select User</label>
                                    <select id="user" class="form-control form-select text-muted" name="user">
                                        <option value="">Users</option>
                                        <?php
                                        while ($user = mysqli_fetch_array($usersq)) {
                                            echo '<option value="' . $user[id] . '">' . $user[username] . '</option>';
                                        }
                                             
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <button type="submit" class="m-4 mx-auto col-3 btn btn-outline-warning text-center">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once('../includes/footer.php');
