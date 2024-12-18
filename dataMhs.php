<?php
$sql = "SELECT * FROM mhs";
$query = mysqli_query($conn, $sql);
$i = 1;
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
    <h2 class="judul">Data Mahasiswa</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th> 
                <th>Angkatan</th>
                <th>Kode Prodi</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $i //nomor angka ;?></td>
                <td><?php echo $row['NIM']; ?></td>
                <td><?php echo $row['namaMhs']; ?></td>
                <td><?php echo $row['angkatan']; ?></td>
                <td><?php echo $row['kode_prodi']; ?></td>
                <td>
                    <a href="editMhs.php?hal=editMhs&id=<?php echo $row['id']; ?>" class="tombol edit">Edit</a> 
                    <a href="deleteMhs.php?hal=deleteMhs&id=<?php echo $row['id']; ?>" class="tombol hapus">Delete</a>
                </td>
            </tr>
        <?php
            $i++;
        } ?>

        </tbody>
    </table> 
</html>