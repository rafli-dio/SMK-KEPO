<?php
require 'functions.php';

if(isset($_POST['daftar'])){
  if(registrasi($_POST) > 0){
    echo "
    <script>
      alert('User Baru Berhasil Ditambahkan')
    </script>
    ";
  }else{
    echo mysqli_error($db);
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
    <style>
      body{
        height: 700px;
      }
    </style>
  </head>
  <body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
            <div class="judul">
            <a class="navbar-brand" href="#">SMK Kepo</a>
            </div>
          </nav>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <section class="jumbotron-bg">
    <div class="jumbotron warna-bg text-white">
        <div class="container">
        <h1 class="display-4">Selamat Datang</h1>
        <p class="lead">Silahkan Registrasi Terlebih Dahulu</p>
    </div>
      </div>
   </section>
   <!-- akhir jumbotron -->

    <!-- form REGISTRASI SI SWA siswa -->
    <div class="container">
        <form action="" method="POST">
        <div class="form-group mt-4">
          <label for="username">Username :</label>
          <input type="text" name="username" class="form-control" id="username" required autocomplete="off"> 
        </div>
        
        <div class="form-group">
          <label for="password">Password :</label>
          <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <div class="form-group">
          <label for="password2">Konfirmasi Password :</label>
          <input type="password" name="password2" class="form-control" id="password2" required>
        </div>

        <button type="submit" name="daftar" class="btn btn-success mt-2 float-right" style="font-weight:bold;">Daftar</button>
        <button type="submit" name="login" class="btn btn-success mt-2 float-right" style="margin-right:20px;"><a style="color:white; font-weight:bold;" href="login.php">Login</a></button>
        </form>
        
    </div>
    <!-- akhir form REGISTRASI siswa -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>