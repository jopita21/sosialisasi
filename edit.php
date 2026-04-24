<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: /sosialisasi/login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM sosialisasi WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_pemohon'];
    $judul = $_POST['judul_kegiatan'];
    $tema = $_POST['tema_sosialisasi'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $tgl_pelaksanaan = $_POST['tgl_pelaksanaan'];
    $lokasi = $_POST['lokasi'];
    $jumlah = $_POST['jml_peserta'];

    mysqli_query($conn, "UPDATE sosialisasi SET
        nama_pemohon='$nama',
        judul_kegiatan='$judul',
        tema_sosialisasi='$tema',
        tgl_pengajuan='$tgl_pengajuan',
        tgl_pelaksanaan='$tgl_pelaksanaan',
        lokasi='$lokasi',
        jml_peserta='$jumlah'
        WHERE id='$id'
    ");

    header("Location: /sosialisasi/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
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
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        button {
            flex: 1;
            padding: 10px;
            background: #ffc107;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-back {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            background: #6c757d;
            color: white;
            border-radius: 5px;
        }

        button:hover,
        .btn-back:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="navbar">
    Edit Data Sosialisasi
</div>

<div class="container">
    <div class="card">
        <form method="POST">

            <label>Nama Pemohon</label>
            <input type="text" name="nama_pemohon" value="<?= $d['nama_pemohon'] ?>" required>

            <label>Judul Kegiatan</label>
            <input type="text" name="judul_kegiatan" value="<?= $d['judul_kegiatan'] ?>" required>

            <label>Tema Sosialisasi</label>
            <input type="text" name="tema_sosialisasi" value="<?= $d['tema_sosialisasi'] ?>" required>

            <label>Tanggal Pengajuan</label>
            <input type="date" name="tgl_pengajuan" value="<?= $d['tgl_pengajuan'] ?>" required>

            <label>Tanggal Pelaksanaan</label>
            <input type="date" name="tgl_pelaksanaan" value="<?= $d['tgl_pelaksanaan'] ?>" required>

            <label>Lokasi</label>
            <input type="text" name="lokasi" value="<?= $d['lokasi'] ?>" required>

            <label>Jumlah Peserta</label>
            <input type="number" name="jml_peserta" value="<?= $d['jml_peserta'] ?>" required>

            <div class="button-group">
                <button type="submit" name="update">Update</button>
                <a href="/sosialisasi/index.php" class="btn-back">← Kembali</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>