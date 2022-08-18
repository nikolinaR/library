<?php
require_once('../includes/db.php');
require_once('../includes/header.php');
$query = "SELECT * FROM authors";
$result = mysqli_query($connect, $query);
?>
<div class="m-4">
    <h3 class="py-4">Authors Dashboard </h3>
    <a href="add_author.php" class="btn btn-success"> <i class="bi bi-plus-circle-fill"></i> Add author</a>
</div>
<div class="container-fluid">
    <div class="mt-5">
        <table class="table align-middle">
            <thead class="bg-warning">
                <tr>
                    <th>#ID</th>
                    <th>Author Name</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td>' . $row['id'] . '</td> 
                            <td>' . $row['author_name'] . '</td>
                            <td  class="d-flex justify-content-evenly">
                                <a href="edit_author.php?id=' . $row['id'] . '" class="link-warning mb-0"><i class="bi bi-pencil"></i>Edit</a>
                                <a href="delete_author.php?id=' . $row['id'] . '" class="link-danger"><i class="bi bi-trash"></i>Delete</a>
                            </td>
                          </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once('../includes/footer.php');
