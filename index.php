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

<!-- ICON -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
* {
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    margin: 0;
    background: #f4f6f9;
}

/* NAVBAR */
.navbar {
    background: linear-gradient(135deg, #4CAF50, #2e7d32);
    color: white;
    padding: 15px 25px;
    font-size: 20px;
    font-weight: bold;
}

/* CONTAINER */
.container {
    padding: 25px;
}

/* BUTTON GLOBAL (FIX PRESISI) */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 6px;
    font-size: 13px;
    text-decoration: none;
    transition: 0.2s;
}

/* WARNA */
.btn-add { padding: 8px 14px; width: auto; height: auto; background: #007bff; color: white; }
.btn-back { padding: 8px 14px; width: auto; height: auto; background: #6c757d; color: white; }

.btn-edit { background: #ffc107; color: black; }
.btn-delete { background: #dc3545; color: white; }
.btn-acc { background: #28a745; color: white; }

.btn-tolak {
    background: transparent;
    border: 1px solid #dc3545;
    color: #dc3545;
}

.btn-tolak:hover {
    background: #dc3545;
    color: white;
}

.btn:hover {
    opacity: 0.9;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
}

th, td {
    padding: 12px;
    font-size: 13px;
}

th {
    background: #4CAF50;
    color: white;
    text-align: left;
}

tr:nth-child(even) {
    background: #f9f9f9;
}

tr:hover {
    background: #eef2f7;
}

/* STATUS */
.badge {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
}

.badge-menunggu {
    background: #fff3cd;
    color: #856404;
}

.badge-disetujui {
    background: #d4edda;
    color: #155724;
}

.badge-ditolak {
    background: #f8d7da;
    color: #721c24;
}

/* AKSI */
.aksi {
    display: flex;
    gap: 5px;
}
</style>

</head>
<body>

<div class="navbar">Data Sosialisasi</div>

<div class="container">

    <div style="margin-bottom:20px; display:flex; gap:10px;">
        <a href="/sosialisasi/tambah.php" class="btn btn-add">+ Tambah Data</a>
        <a href="/sosialisasi/dashboard.php" class="btn btn-back">← Kembali</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Pemohon</th>
            <th>Judul</th>
            <th>Tema</th>
            <th>Tgl Pengajuan</th>
            <th>Tgl Pelaksanaan</th>
            <th>Lokasi</th>
            <th>Peserta</th>
            <th>Status</th>
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

            <!-- STATUS -->
            <td>
                <?php
                if($d['status']=='menunggu'){
                    echo "<span class='badge badge-menunggu'>Menunggu</span>";
                }elseif($d['status']=='disetujui'){
                    echo "<span class='badge badge-disetujui'>Disetujui</span>";
                }elseif($d['status']=='ditolak'){
                    echo "<span class='badge badge-ditolak'>Ditolak</span>";
                }else{
                    echo "-";
                }
                ?>
            </td>

            <!-- AKSI -->
            <td>
                <div class="aksi">

                    <a href="/sosialisasi/edit.php?id=<?= $d['id'] ?>" class="btn btn-edit" title="Edit">
                        <i class="fas fa-pen"></i>
                    </a>

                    <a href="/sosialisasi/hapus.php?id=<?= $d['id'] ?>"
                       class="btn btn-delete"
                       title="Hapus"
                       onclick="return confirm('Yakin hapus data?')">
                        <i class="fas fa-trash"></i>
                    </a>

                    <?php if($d['status']=='menunggu'){ ?>
                        <a href="/sosialisasi/acc.php?id=<?= $d['id'] ?>" class="btn btn-acc" title="Setujui">
                            <i class="fas fa-check"></i>
                        </a>

                        <a href="/sosialisasi/tolak.php?id=<?= $d['id'] ?>" class="btn btn-tolak" title="Tolak">
                            <i class="fas fa-times"></i>
                        </a>
                    <?php } ?>

                </div>
            </td>

        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>