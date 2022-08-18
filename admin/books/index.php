<?php
require_once('../includes/db.php');
require_once('../includes/header.php');
$query = "SELECT books.id, books.book_name,  books.isbn, categories.name, books.price, authors.author_name from books 
join categories on books.category_id=categories.id 
join authors on books.author_id=authors.id order by books.id asc;";
$result = mysqli_query($connect, $query);
?>
<div class="m-4">
    <h3 class="py-4">Books Dashboard</h3>
    <a href="add_book.php" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Add new book</a>
</div>
<div class="container">
    <div class="mt-5">
        <table class="table align-middle table-hover ">
            <thead class="bg-warning">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Author</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Price</th>
                    <th scope="col">Genre</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . $row['author_name'] . '</td>
                            <td>' . $row['book_name'] . '</td>
                            <td>' . $row['isbn'] . '</td>
                            <td>' . $row['price'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td class="d-flex justify-content-evenly">
                                <a href="edit_book.php?id=' . $row['id'] . '" class="link-warning mb-0"><i class="bi bi-pencil"></i>Edit</a>
                                <a href="delete_book.php?id=' . $row['id'] . '" class="link-danger mb-0"><i class="bi bi-trash"></i>Delete</a>
                            </td>
                        </tr>';
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once('../includes/footer.php');
