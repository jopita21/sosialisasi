<?php
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "UPDATE sosialisasi SET status='ditolak' WHERE id='$id'");

header("Location: index.php");
?>