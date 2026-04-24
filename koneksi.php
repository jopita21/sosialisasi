<?php
$conn = mysqli_connect("localhost", "root", "", "sosialisasi_kelurahan");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>