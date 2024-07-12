<?php
session_start();

// Hapus semua variabel session
session_unset();

// Hapus session
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: index.php?page=loginUser");
exit;
?>