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
            <?php include "dataMhs.php" ?>
        </div>
    </div>
</body>

</html>
<?php
}
?> 