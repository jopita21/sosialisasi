<?php
include 'koneksi.php';

// data user
$username = "admin";
$password = password_hash("123456", PASSWORD_DEFAULT);

// simpan ke database
$query = mysqli_query($conn, "INSERT INTO users (username, password) 
VALUES ('$username', '$password')");

// cek berhasil atau tidak
if ($query) {
    echo "User berhasil dibuat!";
} else {
    echo "Gagal membuat user!";
}
?>