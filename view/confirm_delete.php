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
//print_r($form);
if (!isset($form)) {
    header("location: index.php", true, 301);
    exit();
}
?>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb-4 mt-2 text-center">Student Information Website</h1>
                <h2>Deleting Student Data</h2>
                <table class="table table-hover">
                    <tr>
                        <th scope="col" width="15em">Name</th>
                        <td scope="col"><?=$form['nama']?></td>
                    </tr>
                    <tbody>
                        <tr>
                            <th scope="row">NIM</th>
                            <td><?=$form['nim']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Gender</th>
                            <td><?=$form['jenis_kelamin']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Religion</th>
                            <td><?=$form['agama']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Campus</th>
                            <td><?=$form['jurusan']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td><?=$form['alamat']?></td>
                        </tr>
                    </tbody>
                </table>
                <form action="delete.php" method="post">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?=$form['id']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <a href="index.php" class="btn btn-primary" role="button">Cancel</a>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </div>
                    </div>
                </form>
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