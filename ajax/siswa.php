<?php
require '../functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM siswa_sekolah WHERE
nama LIKE '%$keyword%' OR
kelas LIKE '%$keyword%' OR
alamat LIKE '%$keyword%' OR
email LIKE '%$keyword%'";

$dataSiswa = query($query);
?>

<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Email</th>
                <th style="text-align:center;">Gambar</th>
                <th style="text-align:center;">Aksi</th>
            </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach($dataSiswa as $student ) :?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?= $student["nama"]; ?></td>
            <td><?= $student["kelas"]; ?></td>
            <td><?= $student["alamat"]; ?></td>
            <td><?= $student["email"];?></td>
            <td style="text-align:center;"><img src="img/<?= $student["gambar"]; ?>" width="100px"></td>
            <td style="text-align:center;"> 
             <a href="update.php?id=<?= $student["id"];?>"">Ubah</a> |
             <a href="hapus.php?id=<?= $student["id"]; ?>" onClick="return confirm('yakin')">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach ?>
    </table>