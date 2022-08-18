<?php
require_once('../includes/db.php');
require_once('../includes/header.php');

$id = $_GET['id'];
$query = "SELECT issuebook.id, books.book_name, users.username, issuebook.issue_date, issuebook.return_date, issuebook.return_status FROM issuebook  join books on issuebook.book_id=books.id join users on issuebook.user_id=users.id where issuebook.id=" . $id;
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

//for status update on return
if (isset($_GET['st'])) {
    $id = $_GET['st'];
    $update_status = 1;
    $sql = "UPDATE issuebook SET return_status = '$update_status' WHERE id=" . $id;
    $status = mysqli_query($connect, $sql);
    header('location: index.php');
}
?>

<div class="m-2">
    <h3 class="py-4">Issued Book Details</h3>
    <a href="index.php" class="btn btn-outline-dark"><i class="bi bi-caret-left-fill"></i> Back</a>
</div>
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="text-success">Book Name:</th>
                            <td><?php echo $row['book_name']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-success">User Name:</th>
                            <td><?php echo $row['username']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-success">Issued Date:</th>
                            <td><?php echo $row['issue_date']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-success">Returned:</th>
                            <td>
                                <?php
                                if ($row['return_date'] == NULL || $row['return_status'] == 0) {
                                    echo "not returned"; ?>
                                    <a href="edit.php?st=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to return the book?');">
                                        <button class="btn btn-warning ms-3"> Return Book</button>
                                    </a>
                                <?php } else {
                                    echo $row['return_date'];
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
require_once('../includes/footer.php');
