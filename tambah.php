<?php
 session_start();
 if(!isset($_SESSION['masuk'])){
   header("Location: login.php");
   exit;
 }
require "functions.php";

// cek tombol
if(isset($_POST['submit'])){
  if(tambah($_POST) > 0){
    echo "
      <script>
        alert('data berhasil ditambahkan');
        document.location.href ='daftarSiswa.php';
      </script>  
    ";
  }else{
    echo"
      <script>
        alert('data gagal ditambahkan')
        document.location.href='tambah.php'
      </script>
    ";
  }
}
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

    <title>Tambah Siswa</title>
  </head>
  <body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
            <div class="judul">
            <a class="navbar-brand" href="#">SMK Kepo</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse ml-2" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto ml-3">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tambah.php">Tambah Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftarSiswa.php">Daftar Siswa</a>
                  </li>
              </ul>
            </div>
          </nav>
    <!-- akhir navbar -->

    <!-- form tambah siswa -->
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="nama">Nama :</label>
          <input type="text" name="nama" class="form-control" id="nama" required>
        </div>

        <label for="kelas">Pilih Kelas :</label>
        <div class="input-group mb-3">
          <select class="custom-select" id="kelas" name="kelas" required>
                   <option selected>Pilih Kelas ...</option>
                    <option value="X RPL">X RPL</option>
                    <option value="XI RPL">XI RPL</option>
                    <option value="XII RPL">XII RPL</option>
                    <option value="X TKJ">X TKJ</option>
                    <option value="XI TKJ">XI TKJ</option>
                    <option value="XII TKJ">XII TKJ</option>
                    <option value="X TKR">X TKR</option>
                    <option value="XI TKR">XI TKR</option>
                    <option value="XII TKR">XII TKR</option>
          </select>
         </div>

         <div class="form-group">
          <label for="alamat">Alamat :</label>
          <input type="text" name="alamat" class="form-control" id="alamat" required>
        </div>
        
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="text" name="email" class="form-control" id="email" required>
        </div>

        <div class="form-group">
          <label for="gambar">Gambar :</label> <br>
          <input type="file" name="gambar" id="gambar" required>
        </div>
        <!-- button -->
        <button type="submit" name="submit" class="btn btn-success mt-4 float-right"">Tambah</button>
    </div>
      </form>
    </div>
    <!-- akhir form tambah siswa -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>