<?php
    // koneksi db
    require "koneksi.php";
    // 
    function query($query){
        global $db; //mengambil db di luar function menggunakan keyword global
        $result = mysqli_query($db,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    };


// tambah data

function tambah($data){
    global $db;

    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);

    // upload gambar
    $gambar = upload();
    if ($gambar === false){
        return false;
    }

    $query = "INSERT INTO siswa_sekolah VALUES ('','$nama','$kelas','$alamat','$email','$gambar')";
    mysqli_query($db,$query);

    return mysqli_affected_rows($db);
};

// function upload gambar
function upload(){
    $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
    
        if($error === 4){
            echo 
            "<script>
                    alert('Pilih gambar terlebih dahulu');
            </script>";
            return false;
        }
    
        // cek ekstensi gambar
        $ekstensiFotoValid = ['jpeg','png','jpg'];
        $ekstensiFoto = explode('.',$namaFile);
        $ekstensiFoto = strtolower(end($ekstensiFoto)
        );
        if(!in_array($ekstensiFoto,$ekstensiFotoValid)){
            echo 
            "<script>
                alert('yang anda upload bukan gambar');
            </script>";
            return false;
        }
        
        // cek ukuran gambar
        if($ukuranFile > 1000000){
            echo
            "<script>
                alert('Ukuran gambar terlalu besar')
            </script>";
            return false;
        }
    
        // lolos pengecekan gambar siap diupload
        $namaFileBaru = uniqid();
        $namaFileBaru .=$ekstensiFoto;
        move_uploaded_file($tmpName,'img/' . $namaFileBaru);
        return $namaFileBaru;
}

// hapus
function hapus($id){
    global $db;
    mysqli_query($db,"DELETE FROM siswa_sekolah WHERE id = $id");
    return mysqli_affected_rows($db);
}

// searching
function cari($keyword){
    $query = "SELECT * FROM siswa_sekolah WHERE
    nama LIKE '%$keyword%' OR
    kelas LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    email LIKE '%$keyword%'";
    return query($query);
}

// update
function update($data){
    global $db;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek gambar
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE siswa_sekolah SET
        nama='$nama',
        kelas='$kelas',
        alamat='$alamat',
        email='$email',
        gambar='$gambar'
        WHERE id=$id;
    ";
    mysqli_query($db,$query);
    return mysqli_affected_rows($db);
}

// registrasi
function registrasi($data){
    global $db;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($db,$data['password']);
    $password2 = mysqli_real_escape_string($db,$data['password2']);

    // cek username sudah pernah didaftarkan atau belum
    $result = mysqli_query($db, "SELECT username  FROM user_studi_kasus WHERE username ='$username'");
    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('Username sudah pernah terdaftar')
        </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if($password !== $password2){
        echo 
        "
            <script>
            alert('Konfirmasi Password tidak sesuai')
            </script>
        ";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //tambahkan user baru ke database 
    mysqli_query($db,"INSERT INTO user_studi_kasus VALUES('','$username','$password')");

    return mysqli_affected_rows($db);
}



?>



