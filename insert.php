<?php
require('db.php');


if (isset($_POST['insert-submit'])) {
    global $conn;

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($conn, "INSERT INTO mahasiswa (id, nama, nim, prodi, alamat) VALUES (null, '$nama', '$nim', '$prodi', '$alamat')");

    if (mysqli_affected_rows($conn) > 0) {
        header('Location: index.php');
        exit;
    }
}
