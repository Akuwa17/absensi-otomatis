<?php
include "koneksi.php";
// mysqli_query($konek,"insert into setting (jam_masuk, jam_istirahat, jam_kembali, jam keluar)values('$jam_masuk', '$jam_istirahat', '$jam_kembali', '$jam_pulang)")

// jika tombol simpan di klik
if (isset($_POST['btnSimpan']))
{
    // baca isi inputan form
    $jam_masuk =$_POST['jam_masuk'];
    $jam_istirahat   =$_POST['jam_istirahat'];
    $jam_kembali  =$_POST['jam_kembali'];
    $jam_pulang  =$_POST['jam_pulang'];

    // simpan ke tabel karyawan
    $simpan = mysqli_query($konek, "insert into setting(jam_masuk, jam_istirahat, jam_kembali, jam_pulang)values('$jam_masuk', '$jam_istirahat', '$jam_kembali', '$jam_pulang')");
    // jika berhasil tersimpan, tampilkan pesan tersimpan,
    // kembali ke data karyawan
    if($simpan)
    {
        echo "
        <script>
             alert('tersimpan');
             location.replace('setting.php');
        </script>
        ";
    }
    else
    {
        echo "
        <script>
             alert('Gagal tersimpan');
             location.replace('setting.php');
        </script>
        ";
    }
}
// kosongkan tabel tmprfid
mysqli_query($konek, "delete from tmprfid");

?>


<!DOCTYPE html>
<html >
<head>
    <?php include "header.php"; ?>
    <title>SETTING</title>
</head>
<body>
    
<?php include "menu.php"; ?>

 <!-- isi -->

 <div>

 <h2>tetapkan jam</h2>

 <form method="POST">
    
    <div class="from-group">
        <label>JAM MASUK</label>
        <input type="text" name="jam_masuk" id="jam_masuk" placeholder
        ="JAM MASUK" class="from-control" style="width: 400px">
        
    <div class="from-group">
        <label>JAM ISTIRAHAT</label>
        <input type="text" name="jam_istirahat" id="jam_istirahat" placeholder
        ="JAM ISTIRAHAT" class="from-control" style="width: 400px">
        
    <div class="from-group">
        <label>JAM KEMBALI</label>
        <input type="text" name="jam_kembali" id="jam_kembali" placeholder
        ="JAM PULANG" class="from-control" style="width: 400px">
        
    <div class="from-group">
        <label>JAM PULANG</label>
        <input type="text" name="jam_pulang" id="jam_pulang" placeholder
        ="JAM PULANG" class="from-control" style="width: 400px">

    <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">simpan</button>

 </div>

</body>
<?php include "footer.php"; ?>
</html>