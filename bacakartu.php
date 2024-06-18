<?php
include "koneksi.php";
// baca tabel status

// uji mode absensi
date_default_timezone_set('Asia/Makassar');
$jam      = date('H');
$menit    =date('i');
$status= 1;
$mode = "masuk";
// switch ($jam) {
//     case 5:
       
//         break;
//     case 6:
//         $status= 1;
//         $mode = "masuk";
//         break;
//     case 15:
//         $status= 2;
//         $mode = "pulang";
//         break;
//     case 16:
//         $status= 2;
//         $mode = "pulang";
//         break;
//     case 17:
//         $status= 2;
//         $mode = "pulang";
//         break;
//     case 22:
//         $status= 2;
//         $mode = "pulang";
//         break;
    
//     default:
//       $status= 1;
//         $mode = "masuk";
//         break;
// }

$simpan = mysqli_query($konek, "update status set mode='$status'");
// baca tabel tmprfid
$baca_kartu = mysqli_query($konek, "select * from tmprfid");
$data_kartu = mysqli_fetch_array($baca_kartu);
if ($data_kartu != NULL) {
 
    $nokartu    = $data_kartu['nokartu'];
}


?>



<div class="container-fluid" style="text-align: center;">
<?php 
$baca_kartu = mysqli_query($konek, "select * from tmprfid");
$data_kartu = mysqli_fetch_array($baca_kartu);
if($data_kartu == NULL) { ?>


<h3>Absen : <?php echo $mode; ?><br>
<img src="images/rfid.png" style="width: 200px"><br>
<img src="images/animasi2.gif">
<?php } else { 
    // cek nomor kartu RFID tersebut apakah terdaftar di tabel karyawan
    $cari_karyawan = mysqli_query($konek, "select * from karyawan where nokartu='$nokartu'");
    $jumlah_data = mysqli_num_rows($cari_karyawan);
    
    if ($jumlah_data==0)
         echo "<h1></h1>Maaf! kartu tidak Dikenali</h1>";
        else
        {
            $hadir='hadir';
            $bolos='bolos';
            // ambil nama karyawan
            $data_karyawan = mysqli_fetch_array($cari_karyawan);
            $nama          = $data_karyawan['nama'];

            // tanggal dan jam hari ini
            date_default_timezone_set('Asia/Makassar');
            $tanggal  = date('Y-m-d');
            $jam      = date('H:i:s');

            // cek di tabel absensi apakah nomor kartu tersebut sudah ada
            // sesuai tanggal saat ini. Apabila belum ada, maka dianggap
            // absen masuk, tapi kalau sudah ada, maka update data sesuai absensi
            $cari_absen = mysqli_query($konek, "select * from absensi where nokartu='$nokartu' and tanggal='$tanggal'");
            // hitung jumlah data
            $jumlah_absen = mysqli_num_rows($cari_absen);
            if($status == 1)
            {
                echo "<h1>Selamat Datang <br> $nama</h1>";
                mysqli_query($konek, "insert into absensi(nokartu, tanggal, jam_masuk, status)values('$nokartu', '$tanggal', '$jam','$bolos')");
              
              
            }
            else
{
// update sesuai pilihan mode absen
if($status == 2)
{
      echo "<h1>Selamat Istirahat <br> $nama</h1>";
      mysqli_query($konek, "update absensi set jam_pulang='$jam', status='$hadir' where nokartu='$nokartu' and tanggal='$tanggal'");

}

           }

        }
    // kosongkan tabel tmprfid
    mysqli_query($konek, "Delete from tmprfid");
 } ?>



</div>