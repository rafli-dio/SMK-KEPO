<?php
session_start();
require 'functions.php';

// cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // mengambil username berdasarkan id
    $result = mysqli_query($db, "SELECT username FROM user_studi_kasus WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if($key === hash('sha256',$row['username'])){
        $_SESSION['masuk'] = true;
    }
}




// jika klik login langsung pindah halaman ke index.php
if(isset($_SESSION['masuk'])){
    header("Location: index.php");
    exit;
}
//  
if(isset($_POST['masuk'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

   $result = mysqli_query($db, "SELECT * FROM user_studi_kasus WHERE username='$username'");

//    cek username
if(mysqli_num_rows($result) === 1 ){
    // cek password

    $row = mysqli_fetch_assoc($result);
  if  (password_verify($password, $row['password'])){
    //   set session
    $_SESSION['masuk'] = true;

    // cek remember me
    if(isset($_POST['remember'])){
        // kita buat cookie
        setcookie("id", $row['id'], time() +60);
        setcookie("key", hash('sha256', $row['username']), time()+60);
    }
        header("Location: index.php");
        exit;
  }
}

$error = true;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-primary">
       
    <div class="container justify-content-center" style="margin-top:100px;">
        <h1 class="text-center text-light">SMK KEPO</h1>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card p-4 shadow-lg border-0 my-4">
                 <!-- pesan error -->
             <?php if(isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                        <p style="color:red; font-style: italic; text-align:center; font-weight:bold;">Username / Password Salah</p>
                        </div>
             <?php endif ?>
            <!-- akhir pesan error -->
                    <h4 class="py-3 text-center">LOGIN</h4>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" name="username" id="username" placeholder="Username" class="form-control" style="border-radius:20px;" for="username" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" style="border-radius:20px;" for="password">
                        </div>
                        <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" style="border-radius:20px;" name="masuk">Login</button>
                        </div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                </div>
            </div>
        </div>
    </div>
                 <!-- REGITRASI -->
                 <button type="button" class="btn btn-success float-right" style="border-radius:20px; margin-right:360px; margin-top:15px;" name="registrasi"><a href="registrasi.php" style="color:white; font-weight:bold;">Registrasi</a></button>
                <!-- AKHIR REGISTRASI -->
                
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html> 
