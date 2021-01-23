<?php 
// login
 session_start();
 if(!isset($_SESSION['masuk'])){
   header("Location: login.php");
   exit;
 }
//  akhir login
require 'functions.php';
// pagination
    $dataPerHalaman = 3;
    $result = mysqli_query($db,"SELECT * FROM siswa_sekolah");
    $jumlahData = mysqli_num_rows($result);
    $jumlahHalaman = ceil($jumlahData / $dataPerHalaman);

    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($dataPerHalaman * $halamanAktif) - $dataPerHalaman;
  // akhir pagination
// mengambil data siswa dari database
$dataSiswa = query("SELECT * FROM siswa_sekolah LIMIT $awalData, $dataPerHalaman");
// fungsi searching
if(isset($_POST["cari"])){
    $dataSiswa = cari($_POST["keyword"]);
}
// akhir fungsi searching
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/styleindex.css"> 

    <title>Daftar Siswa</title>
  </head>
  <body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="judul">
    <a class="navbar-brand" href="#">SMK Kepo</a>
  </div> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tambah.php">Tambah Siswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="daftarSiswa.php">Daftar Siswa</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action=""  method="POST">
      <input class="form-control mr-sm-2" type="text" placeholder="Cari Siswa" name="keyword" autocomplete="off" autofocus id="keyword">
      <button class="btn btn-success my-2 my-sm-0" type="submit" name="cari" id="tombol-cari">Cari Siswa</button>
    </form>
  </div>
</nav>

<!-- tabel siswa -->
<div id="container">
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
    </div>
<!-- akhir tabel siswa -->
          <!-- HALAMAN -->
        
          <ul class="pagination justify-content-center">
          <?php if($halamanAktif > 1) :?>
          <a class="page-link" href="?halaman=<?= $halamanAktif - 1;?>" aria-label="Previous">&laquo;</a>
          <?php endif;?>
          <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
          <?php if($i == $halamanAktif) :?>
            <li class="page-item">
              <a class="page-link" href="?halaman=<?=$i;?>" style="font-weigh:bold;"><?= $i?></a>
            </li>
          <?php else :?>
            <li class="page-item">
              <a class="page-link" href="?halaman=<?=$i;?>"><?= $i?></a>
            </li>
          <?php endif;?>
          <?php endfor;?>
          <?php if($halamanAktif < $jumlahHalaman) :?>
          <a class="page-link" href="?halaman=<?= $halamanAktif + 1;?>" aria-label="Previous">&raquo;</a>
          <?php endif;?>
          </ul>
          <!--Akhir Halaman-->

    <!-- akhir navbar -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>

