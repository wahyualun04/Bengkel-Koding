<?php
require('koneksi.php');

if ($mysqli->connect_error) {
    die("Koneksi Gagal: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_user = $mysqli->prepare("SELECT * FROM user WHERE username = ?");
    $check_user->bind_param("s", $username);
    $check_user->execute();
    $result = $check_user->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header('location: index.php');
        } else {
            echo "<div class=text-center><h4 style=color:red;>Password Salah</h4></div>";
        }
    } else {
        echo "<div class=text-center><h4 style=color:red;>Username Tidak Ditemukan</h4></div>";
    }
}
?>
<div class="container-fluid justify-content-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="post" action="" class="form-control my-2">
                <div class=" my-2">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class=" my-2">
                    <label lass="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="my-2">
                    <button type="submit"  class="btn btn-primary" name="login" value="login">Login</button>
                </div>
                <div class="my-2">
                <p>Belum Punya akun?</p><a href="index.php?page=registrasiUser" class="btn btn-danger">DAFTAR</a>
                </div>
            </form>
        </div>
    </div>
</div>
