<?php
include "koneksi.php";
// baca isi tabel tmp
    $sql = mysqli_query($konek, "select * from tmprfid");
    $data = mysqli_fetch_array($sql);
    if ($data != NULL) {
        # code...
        $nokartu = $data['nokartu'];
    }
    
    // baca kartu


?>


<div class="from-group">
        <label>No.kartu</label>
        <input type="text" name="nokartu" id="nokartu" placeholder="nomor kartu RFID" class="from-control" style="width: 200px" value="<?php
           $sql = mysqli_query($konek, "select * from tmprfid");
           $data = mysqli_fetch_array($sql);
           if ($data != NULL) {
            echo $nokartu;
           }
       ?>">

    </div>