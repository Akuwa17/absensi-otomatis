<!DOCTYPE html>

<?php
include "koneksi.php";

// jika tombol simpan di klik
if(isset($_POST['btnSimpan']))
{
    // baca isi inputan form
    $username =$_POST['username'];
    $password =$_POST['password'];
    

    // simpan ke tabel karyawan
    $cari_karyawan = mysqli_query($konek, "select * from login where username='$username' and password='$password'");
    $jumlah_data = mysqli_num_rows($cari_karyawan);
    
    // jika berhasil tersimpan, tampilkan pesan tersimpan,
    // kembali ke data karyawan
    if($jumlah_data)
    {
        echo "
        <script>
             alert('login');
             location.replace('utama.php');
        </script>
        ";
    }
    else
    {
        echo "
        <script>
             alert('Gagal login');
             location.replace('index.php');
        </script>
        ";
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log.css">
    <title>login</title>
</head>
<body>
    
    <div class="wrapper">
    <form method="POST">
<h1>login</h1>
<div class="input-box">
        <label>username</label>
        <input type="text" name="username" id="username" placeholder
        ="username" required>
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <label>password</label>
        <input name="password" id="password" placeholder="password" required>
        <i class='bx bxs-lock-alt'></i>
    </div>
    <button class="btn" name="btnSimpan" id="btnSimpan">simpan</button>
   
    <div class="register-link"> <p>selamat mengakses </p></div>
        
</form>
</div>
</body>
</html>


