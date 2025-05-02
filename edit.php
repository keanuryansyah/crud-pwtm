<?php
require('db.php');

if (isset($_POST['edit-submit'])) {
    $nim = $_POST['nim-edit'];
    $nama = $_POST['nama-edit'];
    $prodi = $_POST['prodi-edit'];
    $alamat = $_POST['alamat-edit'];

    $checkNim = mysqli_query($conn, "SELECT nim FROM mahasiswa WHERE nim = '$nim' ");

    if (mysqli_num_rows($checkNim) > 0) {


        $getData = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim' ");

        $getData = mysqli_fetch_assoc($getData);

        if (strlen($nama) > 0) {
            $nama = $nama;
        } else {
            $nama = $getData['nama'];
        }

        if (strlen($prodi) > 0) {
            $prodi = $prodi;
        } else {
            $prodi = $getData['prodi'];
        }

        if (strlen($alamat) > 0) {
            $alamat = $alamat;
        } else {
            $alamat = $getData['alamat'];
        }


        mysqli_query($conn, "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', alamat = '$alamat' WHERE nim = '$nim'");

        header('Location: index.php');
        exit;
    } else {
        header('Location: index.php?notfound');
        exit;
    }
}
