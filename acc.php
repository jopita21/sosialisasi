<?php
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "UPDATE sosialisasi SET status='disetujui' WHERE id='$id'");

header("Location: index.php");
?>