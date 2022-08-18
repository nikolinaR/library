<?php
require_once('../includes/db.php');
require_once('../includes/header.php');
?>

<div>
    <h3 class="mb-3">Authors Dashboard </h3>
    <a href="index.php" class="btn btn-outline-dark"><i class="bi bi-caret-left-fill"></i> Back</a>
</div>
<section class="m-5">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning ">Add author</div>
                    <div class="card-body">
                        
                        <form action="proccess_author.php" method="POST" enctype="multipart/form-data" class="text-muted text-start">
                            <div class="row mb-3 p-2 justify-content-center text-center">
                                <div class="col-6">
                                    <label for="author" class="col-form-label">Author</label>
                                    <input type="text" name="author" class="form-control" id="author">
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="m-4 mx-auto col-3 btn btn-success text-center">
                                    Add Author
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

