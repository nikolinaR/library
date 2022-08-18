<?php
require_once('../includes/db.php');
require_once('../includes/header.php');

$sql = "SELECT issuebook.id, books.book_name, users.email, users.username, issuebook.issue_date,
issuebook.return_date from issuebook join books on issuebook.book_id=books.id 
join users on issuebook.user_id=users.id;";
$result = mysqli_query($connect, $sql);
?>

<div class="m-4">
    <h3 class="py-4">Issued Books </h3>
    <a href="issue_new_book.php" class="btn btn-success mb-5"><i class="bi bi-plus-circle-fill"></i> Issue New Book</a>
</div>
<div class="container-fluid">
    <div class="mt-5">
        <table class="table align-middle">
            <thead class="bg-warning">
                <tr>
                    <th scope="col">Book Name</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Issued Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                                <td>' . $row['book_name'] . '</td>
                                <td>' . $row['username'] . '</td>
                                <td>' . $row['issue_date'] . '</td>'
                ?>
                    <td>
                        <?php ($row['return_date'] == "") ? print "not returned" : print $row['return_date']; ?>
                    </td>
                <?php echo '
                    <td><a href="edit.php?id=' . $row['id'] . '">Edit</></td>
                    </tr>';
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once('../includes/footer.php');
