<?php 

// Memeriksa apakah pengguna sudah login, jika tidak, arahkan kembali ke halaman login
if(!isset($_SESSION["username"])){
    header("location: index.php?page=loginUser");
    exit;
}
?>

<form class="form row" method="POST" action="" name="myForm" onsubmit="return(validate());">
    <!-- Kode php untuk menghubungkan form dengan database -->
    <?php
    include ('koneksi.php');
    $nama_obat = '';
    $kemasan = '';
    $harga = '';
    if (isset($_GET['id'])) {
        $ambil = mysqli_query($mysqli, 
        "SELECT * FROM obat 
        WHERE id='" . $_GET['id'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $nama_obat = $row['nama_obat'];
            $kemasan = $row['kemasan'];
            $harga = $row['harga'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo
        $_GET['id'] ?>">
    <?php
    }
    ?>
    <div>
        <label class="form-label fw-bold">
            Nama Obat
        </label>
        <input type="text" class="form-control my-2" name="nama_obat" value="<?php echo $nama_obat ?>">
        <label class="form-label fw-bold">
            Kemasan
        </label>
        <input type="text" class="form-control my-2" name="kemasan" value="<?php echo $kemasan ?>">
        <label class="form-label fw-bold">
        Harga
        </label>
        <input type="text" class="form-control my-2" name="harga" value="<?php echo $harga ?>">
        <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
  </div>
</form>

<!-- Table-->
<div class="table-responsive my-4">
    <table class="table table-responsive" id="myTable">
        <!--thead atau baris judul-->
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Kemasan</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <!--tbody berisi isi tabel sesuai dengan judul atau head-->
        <tbody>
            <!-- Kode PHP untuk menampilkan semua isi dari tabel urut
            berdasarkan status dan tanggal awal-->
            <?php
            $result = mysqli_query(
                $mysqli,"SELECT * FROM obat ORDER BY nama_obat DESC"
                );
            $no = 1;
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $data['nama_obat'] ?></td>
                    <td><?php echo $data['kemasan'] ?></td>
                    <td><?php echo "Rp. " .number_format($data['harga'],2,',','.')?></td>
                    <td>
                        <a class="btn btn-success rounded-pill px-3" 
                        href="index.php?page=obat&id=<?php echo $data['id'] ?>">Ubah
                        </a>
                        <a class="btn btn-danger rounded-pill px-3" 
                        href="index.php?page=obat&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include ('koneksi.php');
if (isset($_POST['simpan'])) {
    if (isset($_POST['id'])) {
        $ubah = mysqli_query($mysqli, "UPDATE obat SET 
                                        nama_obat = '" . $_POST['nama_obat'] . "',
                                        kemasan = '" . $_POST['kemasan'] . "',
                                        harga = '" . $_POST['harga'] . "'
                                        WHERE
                                        id = '" . $_POST['id'] . "'");
    } else {
        $tambah = mysqli_query($mysqli, "INSERT INTO obat(nama_obat,kemasan,harga) 
                                        VALUES ( 
                                            '" . $_POST['nama_obat'] . "',
                                            '" . $_POST['kemasan'] . "',
                                            '" . $_POST['harga'] . "'
                                            )");
    }

    echo "<script> 
            document.location='index.php?page=obat';
            </script>";
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        $hapus = mysqli_query($mysqli, "DELETE FROM obat WHERE id = '" . $_GET['id'] . "'");
    }

    echo "<script> 
            document.location='index.php?page=obat';
            </script>";
}
?>