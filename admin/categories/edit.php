<?php 

require_once('../includes/db.php');
require_once('functions.php');
require_once('../includes/header.php');


$cat_id = $_GET['cat_id'];
$query = "SELECT * FROM categories WHERE id='$cat_id'";

$fetchOne = mysqli_query($connect, $query);
$cat = mysqli_fetch_assoc($fetchOne);

$query = "SELECT * FROM categories";
$categories = mysqli_query($connect, $query);

$cats = [];
while ($category = mysqli_fetch_assoc($categories)) {
    
    $cats[] = $category;
}

?>

<div class="container my-5">
<h1 class="text-center text-muted">Categories</h1>

<div class="row d-flex justify-content-center align-items-center">
    <div class="col-md-10 top-50 text-muted">
        <h5 class="lead">Edit category</h5>

        <form class="form" method="post" action="/categories/process-edit.php" enctype="multipart/form-data">
            <input type="hidden" name="cat_id" value="<?php echo $cat['id'] ?>">
            <div class="form-row">
                <div class="form-group col-md-12 p-3">
                    <label for="name">Name</label>

                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $cat['name']; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12 p-3">
                    <label for="subcategory">Sub genre</label>
                    <select class="form-control" name="parent_id" id="subcategory">
                        <option value="">Main Genre</option>
                        <?php

                        echo getList($cats);
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-row p-3">
                <button class="btn btn-warning">Edit genre</button>
            </div>
        </form>
    </div>
</div>
</div>
<div class="row">

    <?php  getTree($categories) ?>
</div>


<?php
require_once('../includes/footer.php');
?>
<script>
    $('#subcategory').val(<?php echo $cat['parent_id']; ?>);
</script>