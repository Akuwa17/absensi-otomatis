<!-- proses penyipanan -->

<?php
include "koneksi.php";

// jika tombol simpan di klik
if(isset($_POST['btnSimpan']))
{
    // baca isi inputan form
    $nokartu =$_POST['nokartu'];
    $nama    =$_POST['nama'];
    $alamat  =$_POST['alamat'];

    // simpan ke tabel karyawan
    $simpan = mysqli_query($konek, "insert into karyawan(nokartu, nama, alamat)values('$nokartu', '$nama', '$alamat')");
    // jika berhasil tersimpan, tampilkan pesan tersimpan,
    // kembali ke data karyawan
    if($simpan)
    {
        echo "
        <script>
             alert('tersimpan');
             location.replace('datakaryawan.php');
        </script>
        ";
    }
    else
    {
        echo "
        <script>
             alert('Gagal tersimpan');
             location.replace('datakaryawan.php');
        </script>
        ";
    }
}
// kosongkan tabel tmprfid
mysqli_query($konek, "delete from tmprfid");
?>


<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Tambah Data Karyawan</title>
    <!-- pembacaan otomatis -->
    
    <script type="text/javascript">$(document).ready(function(){
        setInterval(function(){
            $("#norfid").load('nokartu.php')
        }, 0);
    });

    </script>
</head>
<body>

<?php include "menu.php"; ?>
<div class="container-fluid">
<!-- isi -->
<h3>Tambah Data Karyawan</h3>

<!-- form input -->
<form method="POST">
    <div id="norfid"></div>
    <div class="from-group">
        <label>Nama Karyawan</label>
        <input type="text" name="nama" id="nama" placeholder
        ="nama karyawan" class="from-control" style="width: 400px">

    </div>
    <div class="from-group">
        <label>Alamat</label>
        <textarea class="from-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"></textarea>
    </div>
    <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">simpan</button>
</form>
</div>
</body>
</html>