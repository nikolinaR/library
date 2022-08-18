<?php

require_once('includes/db.php');
require_once('includes/header.php');
$b = mysqli_query($connect, "SELECT id FROM books;");
$d = mysqli_num_rows($b);

$authors = mysqli_query($connect, "SELECT id FROM authors;");
$author = mysqli_num_rows($authors);

$users = mysqli_query($connect, "SELECT * FROM users");
$user = mysqli_num_rows($users);

$issuedbooks = mysqli_query($connect, "SELECT id FROM issuebook");
$issb = mysqli_num_rows($issuedbooks);
?>


<div class="container">
  <div class="row">
    <div class="col-xl-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body ">
            <div class="media d-flex justify-content-between">
              <div class="align-self-center pe-5">
                <i class="bi  bi-book text-warning float-start" style="font-size: 50px"></i>
              </div>
              <div class="media-body text-end float-right">
                <h3><?php echo $d; ?></h3>
                <span>Books</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center pe-5">
                <i class="bi bi-person-square text-warning float-start" style="font-size: 50px"></i>
              </div>
              <div class="media-body text-end">
                <h3><?php echo $author; ?></h3>
                <span>Registered Authors</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center pe-5">
                <i class="bi bi-people text-warning float-start" style="font-size: 50px"></i>
              </div>
              <div class="media-body text-end">
                <h3><?php echo $user; ?></h3>
                <span>Registered Users</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center pe-5">
                <i class="bi bi-card-checklist text-warning float-start" style="font-size: 50px"></i>
              </div>
              <div class="media-body text-end">
                <h3><?php echo $issb; ?></h3>
                <span>Issued Books</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<img src="https://wallpaperaccess.com/full/1884665.jpg" class="mt-5" style="height: 70vh;" width="100%" alt="..">


<?php
require_once('includes/footer.php');
