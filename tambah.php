<?php
session_start();
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_pemohon'];
    $judul = $_POST['judul_kegiatan'];
    $tema = $_POST['tema_sosialisasi'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $tgl_pelaksanaan = $_POST['tgl_pelaksanaan'];
    $lokasi = $_POST['lokasi'];
    $jumlah = $_POST['jml_peserta'];

    mysqli_query($conn, "INSERT INTO sosialisasi 
    (nama_pemohon, judul_kegiatan, tema_sosialisasi, tgl_pengajuan, tgl_pelaksanaan, lokasi, jml_peserta) 
    VALUES 
    ('$nama', '$judul', '$tema', '$tgl_pengajuan', '$tgl_pelaksanaan', '$lokasi', '$jumlah')");

    header("Location: /sosialisasi/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <style>
        * {
            font-family: 'Segoe UI', Arial, sans-serif;
            box-sizing: border-box;
        }

        body {
            background: #f4f6f9;
            margin: 0;
        }

        .navbar {
            background: #4CAF50;
            color: white;
            padding: 15px;
            font-size: 18px;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .button-group button,
        .button-group a {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-back {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            background: #6c757d;
            color: white;
        }

        button:hover,
        .btn-back:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="navbar">
    Tambah Data Sosialisasi
</div>

<div class="container">
    <div class="card">
        <form method="POST">

            <label>Nama Pemohon</label>
            <input type="text" name="nama_pemohon" required>

            <label>Judul Kegiatan</label>
            <input type="text" name="judul_kegiatan" required>

            <label>Tema Sosialisasi</label>
            <input type="text" name="tema_sosialisasi" required>

            <label>Tanggal Pengajuan</label>
            <input type="date" name="tgl_pengajuan" required>

            <label>Tanggal Pelaksanaan</label>
            <input type="date" name="tgl_pelaksanaan" required>

            <label>Lokasi</label>
            <input type="text" name="lokasi" required>

            <label>Jumlah Peserta</label>
            <input type="number" name="jml_peserta" required>

            <div class="button-group">
                <button type="submit" name="simpan">Simpan</button>
                <a href="/sosialisasi/index.php" class="btn-back">← Kembali</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>