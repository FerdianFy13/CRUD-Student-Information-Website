<?php
require "../db_con.php"; // menambahkan file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") { // cek metode request
    $nama = test_input($_POST["nama"]);
    $nim = test_input($_POST["nim"]);
    $jenis_kelamin = test_input($_POST["jenis_kelamin"]);
    $agama = test_input($_POST["agama"]);
    $jurusan = test_input($_POST["jurusan"]);
    $alamat = test_input($_POST["alamat"]);

    // query ke database
    $query = "INSERT INTO form (nama,nim,jenis_kelamin,agama,jurusan,alamat) VALUES ('$nama','$nim','$jenis_kelamin', '$agama', '$jurusan','$alamat')";

    if (mysqli_query($db, $query)) {
        header("location: index.php", true, 301);
        exit();
    }
    else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
}
mysqli_close($db);

// function untuk menyaring data
// function test_input($data)
// {
//     $data = trim($data); // menghapus spasi tambahan, tab, ganti baris
//     $data = stripslashes($data); // menghapus slash /
//     $data = htmlspecialchars($data); // menambahkan escaped character u/ karakter khusus
//     return $data;
// }