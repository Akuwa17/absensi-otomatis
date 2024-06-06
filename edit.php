proses penyipanan

<?php
include "koneksi.php";

// baca id data yang akan di edit
$id = $_GET['id'];

// baca data karyawan berdasarkan id
$cari = mysqli_query($konek, "select * from karyawan where id='$id'");
$hasil = mysqli_fetch_array($cari);


// jika tombol simpan di klik
if(isset($_POST['btnSimpan']))
{
    // baca isi inputan form
    $nokartu =$_POST['nokartu'];
    $nama    =$_POST['nama'];
    $alamat  =$_POST['alamat'];


    // simpan ke tabel karyawan
   $simpan = mysqli_query($konek, "update karyawan set nokartu='$nokartu', nama='$nama', alamat='$alamat' where id='$id'");
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
?>


<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Tambah Data Karyawan</title>
</head>
<body>
    
<?php include "menu.php"; ?>

<!-- isi -->
<h3>Tambah Data Karyawan</h3>

<!-- form input -->
<form method="POST">
    <div class="from-group">
        <label>No.kartu</label>
        <input type="text" name="nokartu" id="nokartu" placeholder
        ="nomor kartu RFID" class="from-control" style="width: 200px" value="<?php echo $hasil['nokartu']; ?>">

    </div>
    <div class="from-group">
        <label>Nama Karyawan</label>
        <input type="text" name="nama" id="nama" placeholder
        ="nama karyawan" class="from-control" style="width: 400px" value="<?php echo $hasil['nama']; ?>">

    </div>
    <div class="from-group">
        <label>Alamat</label>
        <textarea class="from-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"><?php echo $hasil['alamat']; ?></textarea>
    </div>
    <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">simpan</button>
</form>
</body>
</html>