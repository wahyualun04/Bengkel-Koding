
<?php 

// Memeriksa apakah pengguna sudah login, jika tidak, arahkan kembali ke halaman login
if(!isset($_SESSION["username"])){
    header("location: index.php?page=loginUser");
    exit;
}
?>

<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-4 card" style="width: 30rem;">
            <table class="table table-responsive text-center">
                <?php
                include ('koneksi.php');
                date_default_timezone_set("Asia/Jakarta");
                $result = mysqli_query($mysqli, "SELECT pr.*,d.nama as 'nama_dokter', p.nama as 'nama_pasien' FROM periksa pr LEFT JOIN dokter d ON (pr.id_dokter=d.id) LEFT JOIN pasien p ON (pr.id_pasien=p.id) WHERE pr.id='" . $_GET['id'] . "'");
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr><td><?php echo "Pasien : ".$data['nama_pasien'] ?></td></tr>
                    <tr><td><?php echo "Dokter : ".$data['nama_dokter'] ?></td></tr>
                    <tr><td><?php echo "Tanggal Periksa : ".date('d-M-Y H:i:s', strtotime ($data['tgl_periksa']))  ?></td></tr>
                    <tr><td><?php echo "Catatan : ".$data['catatan'] ?></td></tr>
                    <tr><td class="bg-success bg-gradient">Biaya Periksa | Rp <?= number_format($data['biaya_periksa'],2,',','.'); ?></td></tr>
                <?php
                }
                ?>

                <tr><td class="bg-info bg-gradient">Biaya Dokter | Rp 150.000</td></tr>

                <?php
                include ('koneksi.php');
                date_default_timezone_set("Asia/Jakarta");
                $result = mysqli_query($mysqli, "SELECT pr.*,o.nama_obat as 'nama_obat',o.harga as 'harga'
                        FROM periksa pr 
                        LEFT JOIN detail_periksa dp ON (pr.id = dp.id_periksa) 
                        LEFT JOIN obat o ON (dp.id_obat=o.id) 
                        WHERE pr.id = '".$_GET ['id']."'");
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr><td class="bg-info bg-gradient"><?php echo $data['nama_obat']. ' | Rp ' .number_format($data['harga'],2,',','.')?></td></tr>
                <?php
                }
                ?>

            </table>
        </div>
    </div>
    <a class="btn btn-primary my-2" href="index.php?page=periksa">Kembali</a>
</div>