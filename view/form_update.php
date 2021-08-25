<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
require "../head.php";
?>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="javascript:void(0)">INSTITUTION</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
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
                    <a class="nav-link" href="../registration/form_create.php">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../view/index.php">View</a>
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
    <?php

// mengambil data form dengan id=..
require "../db_con.php";
$id = test_input($_GET["id"]);
$query = "SELECT * FROM form WHERE id='$id'";
$hasil = mysqli_query($db, $query);
$form = mysqli_fetch_assoc($hasil);
// print_r($form);
?>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb-4 mt-2 text-center">Student Information Website</h1>
                <h2>Updating Student Data</h2>
                <div class="bd-example">
                    <form action="update.php" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?=$form['id']?>">
                                <input type="text" class="form-control" name="nama" placeholder="Name"
                                    value="<?=$form['nama']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nim" placeholder="NIM"
                                    value="<?=$form['nim']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="jenis_kelamin" value="Male">
                                    Male</label>
                                <label><input type="radio" name="jenis_kelamin" value="Female">
                                    Female</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Religion</label>
                            <div class="col-sm-10">
                                <Select class="form-control" name="agama" placeholder="Religion"
                                    value="<?=$form['agama']?>">
                                    <option selected>Open this select menu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Catholic">Catholic</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Hindu">Hindu</option>
                                </Select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Campus</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jurusan" placeholder="Campus"
                                    value="<?=$form['jurusan']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" placeholder="Address"
                                    value="<?=$form['alamat']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
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