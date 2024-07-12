<?php

require ('koneksi.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if ($password === $repassword) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $check_existing = $mysqli->prepare("SELECT * FROM user WHERE username = ?");
        $check_existing->bind_param("s", $username);
        $check_existing->execute();
        $result = $check_existing->get_result();
        if ($result->num_rows > 0) {
            echo "<div class=text-center><h4 style=color:red;>Username sudah digunakan</h4></div>";
        } else {
            $register_user = $mysqli->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
            $register_user->bind_param("ss", $username, $hashed_password);
            if ($register_user->execute()) {
                echo "<script>
                alert('Pendaftaran Berhasil'); 
                document.location='index.php?page=loginUser';
                </script>";
            } else {
                echo "<div class=text-center><h4 style=color:red;>Registrasi Gagal</h4></div>";
            }
        }
    } else {
        echo "<div class=text-center><h4 style=color:red;>Password Tidak Cocok</h4></div>";
    }
}
?>
<div class="container-fluid justify-content-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="post" class="form-control" action="">
                <div class="my-2">
                    <label class="form-label">Username *</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="my-2">
                    <label class="form-label">Password *</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="my-2">
                    <label class="form-label">Masukkan Ulang Password *</label>
                    <input type="password" class="form-control" name="repassword" placeholder="Re-enter Password" required>
                </div>
                <div class="my-2">
                    <input type="submit" class="btn btn-primary" name="register" value="register">
                </div>
            </form>
        </div>
    </div>
</div>

    


