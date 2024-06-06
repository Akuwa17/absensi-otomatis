<?php
include "koneksi.php";
// baca isi tabel tmp
if (true) {
    $sql = mysqli_query($konek, "select * from tmprfid");
    $data = mysqli_fetch_array($sql);
    // baca kartu
    $nokartu = $data['nokartu'];
}


?>


<div class="from-group">
        <label>No.kartu</label>
        <input type="text" name="nokartu" id="nokartu" placeholder="nomor kartu RFID" class="from-control" style="width: 200px" value="<?php echo $nokartu; ?>">

    </div>