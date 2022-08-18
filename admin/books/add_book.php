<?php
require_once('../includes/db.php');
require_once('../includes/header.php');

$query = "SELECT * FROM authors";
$result = mysqli_query($connect, $query);

$query = "SELECT * FROM categories";
$categories = mysqli_query($connect, $query);
$cats = [];
?>
<div> 
    <h3 class="mb-3">Add New Book </h3>
    <a href="index.php" class="btn btn-outline-dark"><i class="bi bi-caret-left-fill"></i> Back</a>
</div>
<section class="m-4">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning">Add book</div>
                    <div class="card-body">
                        <form action="proccess_books.php" method="POST" class="text-muted text-start">
                            <div class="row mb-3 p-2">
                                <div class="col-6">
                                    <label for="author" class="form-label">Author Name</label>
                                    <select id="author" class="form-control form-select text-muted" name="author">
                                        <option value="">Select Author</option>
                                        <?php
                                        while ($author = mysqli_fetch_array($result)) {
                                            echo '<option value="' . $author[id] . '">' . $author[author_name] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="book" class="form-label">Book</label>
                                    <input type="text" name="book" class="form-control" id="book">
                                </div>
                            </div>
                            <div class="row mb-3 p-2">
                                <div class="col-12">
                                    <label for="category" class="form-label">Genre</label>
                                    <select class="form-control form-select text-muted" name="category" id="category">
                                        <option value="">Select Genre</option>
                                        <?php while ($category = mysqli_fetch_assoc($categories)) {
                                            echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                                            $cats[] = $category;
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4 p-2">
                                <div class="col-6">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="number" name="isbn" class="form-control" id="isbn">
                                </div>
                                <div class="col-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" id="price">
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class=" mx-auto col-3 btn btn-outline-warning text-center">
                                    Add Book
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
