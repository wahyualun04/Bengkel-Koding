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
    $nama = '';
    $alamat = '';
    $no_hp = '';
    if (isset($_GET['id'])) {
        $ambil = mysqli_query($mysqli, 
        "SELECT * FROM dokter 
        WHERE id='" . $_GET['id'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $nama = $row['nama'];
            $alamat = $row['alamat'];
            $no_hp = $row['no_hp'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo
        $_GET['id'] ?>">
    <?php
    }
    ?>
    <div>
        <label class="form-label fw-bold">Nama</label>
        <input type="text" class="form-control my-2" name="nama" value="<?php echo $nama ?>" required>
        <label class="form-label fw-bold">Alamat</label>
        <input type="text" class="form-control my-2" name="alamat" value="<?php echo $alamat ?>" required>
        <label class="form-label fw-bold">No Telefon</label>
        <input type="text" class="form-control my-2" name="no_hp" value="<?php echo $no_hp ?>" required>
        <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
  </div>
</form>

<!-- Table-->
<div class="table-responsive my-4">
    <table class="table table-hover" id="myTable">
        <!--thead atau baris judul-->
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telefon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <!--tbody berisi isi tabel sesuai dengan judul atau head-->
        <tbody>
            <!-- Kode PHP untuk menampilkan semua isi dari tabel urut
            berdasarkan status dan tanggal awal-->
            <?php
            $result = mysqli_query(
                $mysqli,"SELECT * FROM dokter ORDER BY nama DESC"
                );
            $no = 1;
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['no_hp'] ?></td>
                    <td>
                        <a class="btn btn-success rounded-pill px-3" 
                        href="index.php?page=dokter&id=<?php echo $data['id'] ?>">Ubah
                        </a>
                        <a class="btn btn-danger rounded-pill px-3" 
                        href="index.php?page=dokter&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus
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
        $ubah = mysqli_query($mysqli, "UPDATE dokter SET 
                                        nama = '" . $_POST['nama'] . "',
                                        alamat = '" . $_POST['alamat'] . "',
                                        no_hp = '" . $_POST['no_hp'] . "'
                                        WHERE
                                        id = '" . $_POST['id'] . "'");
    } else {
        $tambah = mysqli_query($mysqli, "INSERT INTO dokter(nama,alamat,no_hp) 
                                        VALUES ( 
                                            '" . $_POST['nama'] . "',
                                            '" . $_POST['alamat'] . "',
                                            '" . $_POST['no_hp'] . "'
                                            )");
    }

    echo "<script> 
            document.location='index.php?page=dokter';
            </script>";
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        $hapus = mysqli_query($mysqli, "DELETE FROM dokter WHERE id = '" . $_GET['id'] . "'");
    }

    echo "<script> 
            document.location='index.php?page=dokter';
            </script>";
}
?>