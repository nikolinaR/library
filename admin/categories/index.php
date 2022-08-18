<?php
require_once('../includes/db.php');
require_once('functions.php');
require_once('../includes/header.php');

$query = "SELECT * FROM categories";
$categories = mysqli_query($connect, $query);

$cats = [];
while ($category = mysqli_fetch_assoc($categories)) {
    $cats[] = $category;
}

?>


<h3 class="mb-3">Genres </h3>
<section class="m-5">
    <div class="cotainer ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning ">Add new genre</div>
                    <div class="card-body">
                        <form class="form" method="post" action="./process.php" enctype="multipart/form-data">
                            <div class="form-row p-3">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="form-row p-3">
                                <div class="form-group col-md-12">
                                    <label for="subcategory">Sub genre</label>
                                    <select class="form-control" name="parent_id" id="subcategory">
                                        <option value="">Main genre</option>
                                        <?php
                                        echo getList($cats);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row p-3">
                                <button class="btn btn-success">Add genre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>
<h4>Edit Genres</h4>

<?php echo getTree($categories); ?>


<?php
require_once('../includes/footer.php');
?>