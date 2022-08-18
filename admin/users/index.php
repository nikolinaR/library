<?php
require_once('../includes/db.php');
require_once('../includes/header.php');

$query = "SELECT * FROM users";
$result = mysqli_query($connect, $query);

//for blocking user
if (isset($_GET['inid'])) {
    $id = $_GET['inid'];
    $status = 0;
    $sql = "UPDATE users set status = '$status' WHERE id=" . $id;
    $block = mysqli_query($connect, $sql);
    header('location: index.php');
}

//for activating user
if (isset($_GET['in'])) {
    $id = $_GET['in'];
    $status = 1;
    $sql = "UPDATE users set status = '$status' WHERE id=" . $id;
    $activate = mysqli_query($connect, $sql);
    header('location: index.php');
}
?>


<h3 class="m-4">Registered Users</h3>
<div class="container-fluid">
    <div class="mt-5">
        <table class="table align-middle">
            <thead class="bg-warning">
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Registered</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                   <td>' . $row['username'] . '</td>
                   <td>' . $row['email'] . '</td>
                   <td>' . $row['telephone'] . '</td>
                   <td>' . $row['registration_date'] . '</td>
                  '; ?>
                    <td>
                        <?php
                        if ($row['status'] == 1) {
                            echo "Active";
                        } else {
                            echo "Blocked";
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($row['status'] == 1) { ?>
                            <a href="index.php?inid=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to block this student?');"> <button class="btn btn-danger "> Block usr</button>
                            <?php } else { ?>
                                <a href="index.php?in=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to active this student?');"><button class="btn btn-primary"> Activate</button>
                            <?php }
                    } ?>
                    </td>
            </tbody>
        </table>
    </div>
</div>

<?php require_once('../includes/footer.php');
