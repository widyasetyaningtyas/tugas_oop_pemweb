<?php
session_start();
ob_start();
include 'config.php';

if (empty($_SESSION['nama'])) {
?>
<p>kalian harus login untuk mengakses halaman ini</p>
<meta http-equiv="refresh" content="1; url=login.php" />
<?php
} else {
    define('INDEX', true)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=devicewidth, initial-scale=1.0" />
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="grid-container">
        <div class="grid-navbar" style="height: 60px;">
            <div class="navbarheader">Sistem Akademik</div>
            <div class="logout"><a href="logout.php" style="margin-right: 20px;">Logout</a></div>
        </div>
        <div class="grid-sidebar">
            <div class="profilepic">
                <img src="images/profil.jpg" alt="" class="imground" />
                <p style="margin-top: 5px;"><?php echo $_SESSION['nama']; ?></p>
            </div>
            <div class="navigation">
                <ul>
                    <li><a href="admin.php">Dashboard</a></li>
                    <li><a href="admin.php">Data Mahasiswa</a></li>
                    <li><a href="tambahMhs.php">Tambah Mahasiswa</a></li> 
                </ul>
            </div>
        </div>
        <div class="grid-head">
            <h2>Selamat Datang di Sistem Akademik</h2>
            <p>Sistem Informasi Akademik Campus Terintegrasi</p>
        </div>
        <div class="grid-content">
            <?php
                if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM mhs WHERE id='$id'";
                $query = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($query);

                if (mysqli_num_rows($query) < 1) {
                die("data tidak ditemukan");
                } else {
            ?>
                <h2 class="judul">Edit Data Mahasiswa</h2>
                <form action="prosesEdit.php" method="POST">
                    <fieldset>
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                        <p>
                            <label for="nim">NIM : </label>
                            <input type="text" name="NIM" placeholder="NIM" value="<?php echo $data['NIM']; ?> ">
                        </p>
                        <p>
                            <label for="nama">Nama : </label>
                            <input type="text" name="namaMhs" placeholder="nama" value="<?php echo $data['namaMhs']; ?> ">
                        </p>
                        <p>
                            <label for="angkatan">Angkatan : </label>
                            <input type="text" name="angkatan" placeholder="Angkatan" value="<?php echo $data['angkatan']; ?> ">
                        </p>
                        <p>
                            <label for="kode_prodi">Kode Prodi : </label>
                            <input type="text" name="kode_prodi" placeholder="Kode Prodi" value="<?php echo $data['kode_prodi']; ?> ">
                        </p>
                        <p>
                            <input type="submit" value="Edit Data" name="edit">
                        </p>
                    </fieldset>
                </form>
            <?php
                }
            }
            ?> 
        </div>
    </div>
</body>

</html>
<?php
}
?> 