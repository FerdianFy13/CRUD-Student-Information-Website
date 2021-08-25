<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: ../login.php", true, 301);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require "../head.php";
?>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="javascript:void(0)">INSTITUTION</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navb">
                <?php
if (isset($_SESSION['user'])) {
    ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../registration/form_create.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../view/index.php">View</a>
                    </li>
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <a class="nav-link active" href="../index.php"><?=$_SESSION["user"]?></a>
                    <a class="nav-link active" href="../logout.php">Logout</a>
                </ul>
                <?php
}
?>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb-4 mt-2 text-center">Student Information Website</h1>
                <h2>Manage Student Data</h2>
                <a href="form_create.php" class="btn btn-danger" role="button">Adding Data</a>
                <div class="bd-example">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Religion</th>
                                <th scope="col">Origin of Campus</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
require "../db_con.php"; // menambahkan file koneksi database
// query ke database
$query = "SELECT * FROM form";
$hasil = mysqli_query($db, $query);
$no = 0;
while ($form = mysqli_fetch_assoc($hasil)) { // simpan dalam array assosiatif
    /*echo "<pre>";
    print_r($form);
    echo "</pre>";*/
    $no++;
    ?>
                            <tr>
                                <th scope="row"><?=$no?></th>
                                <td><?=$form['nama']?></td>
                                <td><?=$form['nim']?></td>
                                <td><?=$form['jenis_kelamin']?></td>
                                <td><?=$form['agama']?></td>
                                <td><?=$form['jurusan']?></td>
                                <td><?=$form['alamat']?></td>
                                <td>
                                    <a href="form_update.php?id=<?=$form['id']?>"
                                        class="text-decoration-none text-info">Edit</a>
                                    <a href="confirm_delete.php?id=<?=$form['id']?>"
                                        class="text-decoration-none text-success">Delete</a>
                                </td>
                            </tr>
                            <?php
}
?>
                        </tbody>
                    </table>
                </div>
                <hr class="d-sm-none">
            </div>
        </div>
    </div>

    <div class="jumbotron text-center bg-light" style="margin-bottom:0">
        <h4><a href="https://github.com/FerdianFy13" class="text-decoration-none text-danger">Ferdian Firmansyah</a>
        </h4>
    </div>

</body>

</html>