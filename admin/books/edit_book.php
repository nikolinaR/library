<?php
require_once('../includes/db.php');
require_once('../includes/header.php');
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id=" . $id;
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

$aut = "SELECT * FROM authors";
$authors = mysqli_query($connect, $aut);

$category = "SELECT * FROM categories";
$sql = mysqli_query($connect, $category);
?>
<div>
    <h3 class="mb-3">Edit book </h3>
    <a href="index.php" class="btn btn-outline-dark"><i class="bi bi-caret-left-fill"></i> Back</a>
</div>

<section class="m-4">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning">Edit book</div>
                    <div class="card-body">
                        <form action="edit_proccess.php" method="POST" class="text-muted text-start">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="row mb-3 p-2">
                                <div class="col-6">
                                    <label for="author" class="col-form-label">Author Name</label>
                                    <select name="author" class="form-control" id="author">
                                        <?php
                                        while ($author = mysqli_fetch_assoc($authors)) {
                                            $selected = '';
                                            if ($row['author_id'] === $author['id']) {
                                                $selected = 'selected';
                                            }
                                            echo ' <option value="' . $author['id'] . '"' . $selected . '>' . $author['author_name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="book" class="col-form-label">Book</label>
                                    <input type="text" name="book" class="form-control" id="book" value="<?php echo $row['book_name'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3 p-2">
                                <div class="col-12">
                                    <label for="category" class="col-form-label">Genre</label>
                                    <select name="category" class="form-control" id="category">
                                        <?php
                                        while ($cat = mysqli_fetch_assoc($sql)) {
                                            $selected = '';
                                            if ($row['category_id'] === $cat['id']) {
                                                $selected = 'selected';
                                            }
                                            echo ' <option value="' . $cat['id'] . '"' . $selected . '>' . $cat['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4 p-2">
                                <div class="col-6">
                                    <label for="isbn" class="col-form-label">ISBN</label>
                                    <input type="number" name="isbn" class="form-control" id="isbn" value="<?php echo $row['isbn'] ?>">
                                </div>
                                <div class="col-6">
                                    <label for="price" class="col-form-label">Price</label>
                                    <input type="number" name="price" class="form-control" id="price" value="<?php echo $row['price'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="ms-3 col-3 btn btn-outline-warning text-center">
                                    Edit Book
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
