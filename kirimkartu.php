<?php 

include "koneksi.php";


//baca nomor kartu rfid dari nodeMCU

$nokartu = $_GET['nokartu'];
///kosonkan tabel rfid

mysqli_query($konek, "delete from tmprfid");

//simpan nomor kartu yang baru ke tabel tmp rfid

$simpan  = mysqli_query($konek, "insert into tmprfid(nokartu)values('$nokartu')");

if ($simpan) {
    echo "berhasiil";
}else{
    echo"gagal";
}

?>