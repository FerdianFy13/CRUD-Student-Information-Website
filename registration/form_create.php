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
                <h2>Student Registration</h2>
                <div class="bd-example">
                    <form action="create.php" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nim" placeholder="NIM">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="jenis_kelamin" value="Male"> Male</label>
                                <label><input type="radio" name="jenis_kelamin" value="Female"> Female</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Religion</label>
                            <div class="col-sm-10">
                                <select name="agama" class="form-control" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Catholic">Catholic</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Hindu">Hindu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Campus</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jurusan" placeholder="Origin of Campus">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" placeholder="Address">
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