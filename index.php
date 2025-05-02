<?php
require('db.php');

function getData($sql)
{
    global $conn;
    $data = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($data)) {
        $rows[] = $row;
    }

    return $rows;
}


$datas = getData("SELECT * FROM mahasiswa");

if (isset($_GET['delete'])) {
    $nim = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = '$nim' ");
    header('Location: index.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="intro-wr">
        <p>Halo ini adalah tugas UTS saya</p>
        <p>Nama: Agham Coyy</p>
        <p>NIM: 2311500207</p>
    </div>

    <div class="content-wr">

        <div id="content-col-1" class="col">
            <form action="insert.php" method="post" name="form-data" id="form-data-insert">
                <h2>INSERT DATA</h2>
                <div id="form1" class="form">
                    <label for="nama" id="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div id="form2" class="form">
                    <label for="nim" id="nim">NIM:</label>
                    <input type="number" name="nim" id="nim" required>
                </div>
                <div id="form3" class="form">
                    <label for="prodi" id="prodi">Prodi:</label>
                    <input type="text" name="prodi" id="prodi" required>
                </div>
                <div id="form4" class="form">
                    <label for="alamat" id="alamat">Alamat:</label>
                    <textarea name="alamat" id="alamat"></textarea>
                </div>
                <button type="submit" name="insert-submit" id="button-insert">Submit</button>
            </form>

            <form action="edit.php" method="post" name="form-data" id="form-data-insert">
                <h2>EDIT DATA BERDASARKAN NIM (Nomor Induk Mahasiswa)</h2>
                <div id="form2" class="form">
                    <label for="nim-edit" id="nim-edit">NIM:</label>
                    <input type="number" name="nim-edit" id="nim-edit" required>
                    <?php
                    if (isset($_GET['notfound'])) {
                        echo '<p style="color: red;">Nim tidak ditemukan.</p>';
                    }
                    ?>
                </div>
                <div id="form1" class="form">
                    <label for="nama-edit" id="nama-edit">Nama:</label>
                    <input type="text" name="nama-edit" id="nama-edit">
                </div>
                <div id="form3" class="form">
                    <label for="prodi-edit" id="prodi-edit">Prodi:</label>
                    <input type="text" name="prodi-edit" id="prodi-edit">
                </div>
                <div id="form4" class="form">
                    <label for="alamat-edit" id="alamat-edit">Alamat:</label>
                    <textarea name="alamat-edit" id="alamat-edit"></textarea>
                </div>
                <button type="submit" name="edit-submit" id="button-insert">Save</button>
            </form>
        </div>
        <div id="content-col-2" class="col">
            <div id="cc2-row-1" class="cc">
                <span>Nama</span>
                <span>NIM</span>
                <span>Prodi</span>
                <span>Alamat</span>
                <span>Action</span>
            </div>

            <div id="cc2-row-2" class="cc">
                <?php
                if (!$datas) {
                ?>

                    <span>Tidak ada data!</span>
                    <?php

                } else {
                    foreach ($datas as $data) {
                    ?>

                        <div class="data-wrapper">
                            <span><?php echo $data['nama'] ?></span>
                            <span><?php echo $data['nim'] ?></span>
                            <span><?php echo $data['prodi'] ?></span>
                            <span><?php echo $data['alamat'] ?></span>
                            <span>
                                <a href="index.php?delete=<?php echo $data['nim']; ?>" id="delete-btn" onclick="return confirm('Yakin ingin hapus data?')">Delete</a>
                            </span>
                        </div>
                <?php
                    }
                }


                ?>
            </div>
        </div>
    </div>

</body>

</html>