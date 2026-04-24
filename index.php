<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: /sosialisasi/login.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM sosialisasi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Sosialisasi</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            background: #f4f6f9;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #4CAF50, #2e7d32);
            color: white;
            padding: 15px 25px;
            font-size: 20px;
            font-weight: bold;
        }

        /* Container */
        .container {
            padding: 20px;
        }

        /* Tombol atas */
        .top-actions {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        /* Button */
        .btn {
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-add { background: #007bff; color: white; }
        .btn-edit { background: #ffc107; color: black; }
        .btn-delete { background: #dc3545; color: white; }
        .btn-back { background: #6c757d; color: white; }

        .btn:hover {
            opacity: 0.85;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #eef2f7;
        }

        /* Aksi */
        .aksi {
            display: flex;
            gap: 8px;
        }
    </style>
</head>

<body>

<div class="navbar">
    Data Sosialisasi
</div>

<div class="container">

    <!-- Tombol -->
    <div class="top-actions">
        <a href="/sosialisasi/tambah.php" class="btn btn-add">+ Tambah Data</a>
        <a href="/sosialisasi/dashboard.php" class="btn btn-back">← Kembali</a>
    </div>

    <!-- Tabel -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama Pemohon</th>
            <th>Judul Kegiatan</th>
            <th>Tema Sosialisasi</th>
            <th>Tanggal Pengajuan</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Lokasi</th>
            <th>Jumlah Peserta</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; while($d = mysqli_fetch_assoc($data)){ ?>
        <tr>
            <td><?= $no++ ?></td>

            <td><?= htmlspecialchars($d['nama_pemohon']) ?></td>

            <td><?= htmlspecialchars($d['judul_kegiatan']) ?></td>

            <td><?= htmlspecialchars($d['tema_sosialisasi'] ?? '-') ?></td>

            <td><?= $d['tgl_pengajuan'] ?? '-' ?></td>

            <td><?= $d['tgl_pelaksanaan'] ?? '-' ?></td>

            <td><?= htmlspecialchars($d['lokasi']) ?></td>

            <td><?= $d['jml_peserta'] ?? '0' ?></td>

            <td class="aksi">
                <a href="/sosialisasi/edit.php?id=<?= $d['id'] ?>" class="btn btn-edit">Edit</a>

                <a href="/sosialisasi/hapus.php?id=<?= $d['id'] ?>" 
                   class="btn btn-delete"
                   onclick="return confirm('Yakin hapus data?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>