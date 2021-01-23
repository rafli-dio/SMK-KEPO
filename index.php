<?php
  session_start();
  if(!isset($_SESSION['masuk'])){
    header("Location: login.php");
    exit;
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
    <title>SMK MAJU</title>
  </head>
  <body>
    <!--awal navbar  -->    
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
              <button type="button" class="btn btn-success" style="border-radius:10px;" name="keluar"><a href="logout.php" style="color:white; font-weight: bold;">Logout</a></button>
            </div>
          </nav>

   <!-- JUMBOTRON -->
   <section class="jumbotron-bg">
    <div class="jumbotron warna-bg text-white">
        <div class="container">
        <h1 class="display-4">Selamat Datang</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum sit vero illum aliquid maxime velit nobis! Quia fugiat deserunt id.</p>
    </div>
      </div>
   </section>

   <!-- konten -->
   <div class="container">
       <div class="row">
           <div class="col-md-3 mb-2">
            <div class="card" >
                <img src="img/gambar1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title text-info">TKR</h6>
                  <h6 class="card-text text-primary">Lorem ipsum dolor sit amet consectetur.</h6>
                </div>
              </div>
           </div>

           <div class="col-md-3 mb-2">
            <div class="card" >
                <img src="img/gambar1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title text-info">TBSM</h6>
                  <h6 class="card-text text-primary">Lorem ipsum dolor sit amet consectetur.</h6>
                </div>
              </div>
           </div>

           <div class="col-md-3 mb-2">
            <div class="card" >
                <img src="img/gambar1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title text-info">Teknik Permesinan</h6>
                  <h6 class="card-text text-primary">Lorem ipsum dolor sit amet consectetur.</h6>
                </div>
              </div>
           </div>

           <div class="col-md-3 mb-2">
            <div class="card" >
                <img src="img/gambar1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title text-info">TKJ</h6>
                  <h6 class="card-text text-primary">Lorem ipsum dolor sit amet consectetur.</h6>
                </div>
              </div>
           </div>

           <div class="col-md-3 mb-2">
            <div class="card" >
                <img src="img/gambar1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title text-info">RPL</h6>
                  <h6 class="card-text text-primary">Lorem ipsum dolor sit amet consectetur.</h6>
                </div>
              </div>
           </div>

           <div class="col-md-3 mb-2">
            <div class="card" >
                <img src="img/gambar1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title text-info">TEI</h6>
                  <h6 class="card-text text-primary">Lorem ipsum dolor sit amet consectetur.</h6>
                </div>
              </div>
           </div>

           <div class="col-md-3 mb-2">
            <div class="card" >
                <img src="img/gambar1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title text-info">Multimedia</h6>
                  <h6 class="card-text text-primary">Lorem ipsum dolor sit amet consectetur.</h6>
                </div>
              </div>
           </div>

           <div class="col-md-3 mb-2">
            <div class="card" >
                <img src="img/gambar1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title text-info">Arsitek</h6>
                  <h6 class="card-text text-primary">Lorem ipsum dolor sit amet consectetur.</h6>
                </div>
              </div>
           </div>
       </div>
   </div>
   <!-- akhit konter -->

   <!-- footer -->
   <footer class="warna-bg">
        <div class="text-white text-center pt-3 pb-3">
            Terima Kasih
        </div>
    </footer>




















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>