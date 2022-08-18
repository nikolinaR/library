<?php
require_once('../includes/db.php');
require_once('../includes/header.php');
$id = $_GET['id'];
$query = "SELECT id, author_name FROM authors WHERE id=" . $id;
$update = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($update);
?>
<div>
    <h3 class="mb-5">Authors Dashboard </h3>
    <a href="index.php" class="btn btn-outline-dark"><i class="bi bi-caret-left-fill"></i> Back</a>
</div>
<section class="m-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning ">Edit author</div>
                    <div class="card-body">
                        <form action="proccess_edit_author.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
                            <div class="form-group row  mb-3 p-2 justify-content-center text-center">
                                <div class="col-md-6">
                                    <label for="author" class="col-form-label">Author Name</label>
                                    <input type="text" name="author" class="form-control" id="author" value="<?php echo $row['author_name']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <button type="submit" class="m-4 mx-auto col-3 btn btn-outline-warning">
                                    Edit
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
