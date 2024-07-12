<?php 

// Memeriksa apakah pengguna sudah login, jika tidak, arahkan kembali ke halaman login
if(!isset($_SESSION["username"])){
    header("location: index.php?page=loginUser");
    exit;
}
?>
<form action="" onsubmit="return(validate());" method="post">
        <!-- AMBIL DATA UNTUK UBAH -->
            <?php
            include ('koneksi.php');
            $id_pasien = '';
            $id_dokter = '';
            $tgl_periksa = '';
            $catatan = '';
            $biaya_periksa = '';
            if (isset($_GET['id'])) {
                $ambil = mysqli_query($mysqli, 
                "SELECT * FROM periksa 
                WHERE id='" . $_GET['id'] . "'");
                while ($row = mysqli_fetch_array($ambil)) {
                    $id_pasien = $row['id_pasien'];
                    $id_dokter = $row['id_dokter'];
                    $tgl_periksa = $row['tgl_periksa'];
                    $catatan = $row['catatan'];
                    $biaya_periksa = $row['biaya_periksa'];
                }
            ?>
                <input type=hidden name="id" value="<?php echo
                $_GET['id'] ?>">
            <?php
            }
            ?>
        <!-- SELECT PASIEN -->
        <label class="fw-bold">Pasien</label>
        <select class="form-control my-2" name="id_pasien">
           <?php
           include ('koneksi.php');
           $selected = '';
           $periksa = mysqli_query($mysqli, "SELECT * FROM pasien");
           while ($data = mysqli_fetch_array($periksa)) {
               if ($data['id'] == $id_pasien) {
                   $selected = 'selected="selected"';
               } else {
                   $selected = '';
               }
           ?>
               <option value="<?php echo $data['id'] ?>"  <?php echo $selected?>> <?php echo $data['nama'] ?></option>
           <?php
           }
           ?>
        </select>

        <!-- SELECT DOKTER -->
       <label class="fw-bold">Dokter</label>
       <select class="form-control my-2" name="id_dokter">
           <?php
           include ('koneksi.php');
           $selected = '';
           $dokter = mysqli_query($mysqli, "SELECT * FROM dokter");
           while ($data = mysqli_fetch_array($dokter)) {
               if ($data['id'] == $id_dokter) {
                   $selected = 'selected="selected"';
               } else {
                   $selected = '';
               }
           ?>
               <option value="<?php echo $data['id'] ?>"  <?php echo $selected ?>><?php echo $data['nama'] ?></option>
           <?php
           }
           ?>
       </select>
       
        <!-- COLOM INSERT DATETIME DAN TEXT -->
       <label class="fw-bold">Tanggal Periksa</label>
       <input type="datetime-local" name="tgl_periksa" value="<?php echo $tgl_periksa ?>" class="form-control my-2"  required>
       
       <label class="fw-bold">Catatan</label>
       <input type="text" class="form-control my-2" name="catatan"  value="<?php echo $catatan ?>"> 

       <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-4 card" style="width: 30rem;">
                    <table class="table table-responsive text-center">
                    <?php 
                    include "koneksi.php";
                    $total = 150000;
                    echo '<tr><td>Biaya Periksa : Rp. '.number_format($total,2,',','.').'</tr></td>';
                    $result = mysqli_query($mysqli,"SELECT dp.*, o.harga as 'harga', o.nama_obat as 'nama_obat' FROM detail_periksa dp
                                                        LEFT JOIN obat o 
                                                        ON (dp.id_obat=o.id) 
                                                        WHERE dp.id_periksa='" . $_GET['id'] . "'");
                        while ($data = mysqli_fetch_array($result)) {
                        ?>

                            <?php $total = $total + $data['harga']; ?>
                            
                            <tr><td><?= $data['nama_obat']; ?> : Rp. <?= number_format($data['harga'],2,',','.'); ?></td></tr>
                        <?php
                        }
                        ?>
                    </table>
                    Total:<input type="text" class="form-control text-center" value="<?= $total?>" name="biaya_periksa">
                </div>
            </div>
        </div>

       

       <button class="btn btn-primary" type="submit" name="simpan" >Submit</button>
    </form>

    <?php
include ('koneksi.php');
if (isset($_POST['simpan'])) {
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $catatan = $_POST['catatan'];
    $biaya_periksa = $_POST['biaya_periksa'];
    if (isset($_POST['id'])) {
        $sql = "UPDATE periksa SET id_pasien='$id_pasien',id_dokter='$id_dokter',tgl_periksa='$tgl_periksa',catatan = '$catatan', biaya_periksa='$biaya_periksa' WHERE id = ". $_POST['id']."";
    }
        
    if ($mysqli->query($sql) == TRUE)
    { echo "<script> 
        document.location='index.php?page=periksa';
        </script>";}
    else
    {echo "Error: " . $sql . "<br>" . $mysqli->error;}
    $mysqli->close();
}