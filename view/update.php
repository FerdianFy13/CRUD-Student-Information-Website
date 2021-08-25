<?php
require "../db_con.php"; // menambahkan file koneksi database
if ($_SERVER["REQUEST_METHOD"] == "POST") { // cek metode request
    $id = test_input($_POST["id"]);
    $nama = test_input($_POST["nama"]);
    $nim = test_input($_POST["nim"]);
    $jenis_kelamin = test_input($_POST["jenis_kelamin"]);
    $agama = test_input($_POST["agama"]);
    $jurusan = test_input($_POST["jurusan"]);
    $alamat = test_input($_POST["alamat"]);

    // query ke database
    $query = "UPDATE form SET nama='$nama', nim='$nim',jenis_kelamin='$jenis_kelamin', agama='$agama',jurusan='$jurusan',alamat='$alamat' WHERE id='$id'";

    if (mysqli_query($db, $query)) {
        header("location: index.php", true, 301);
        exit();
    }
    else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
}
mysqli_close($db);