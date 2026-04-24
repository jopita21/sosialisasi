<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /sosialisasi/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        /* FONT SERAGAM */
        * {
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f4f6f9;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .navbar {
            background: #4CAF50;
            padding: 15px;
            color: white;
            font-size: 18px;
            text-align: center;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }

        /* BUTTON VERTIKAL */
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            text-align: center;
            display: block;
        }

        .btn-primary {
            background: #007bff;
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="navbar">
    Dashboard
</div>

<div class="container">
    <div class="card">
        <h3>Halo, <?= $_SESSION['username']; ?> 👋</h3>
        <p>Selamat datang di sistem sosialisasi.</p>

        <div class="btn-group">
            <a href="/sosialisasi/index.php" class="btn btn-primary">📋 Data Sosialisasi</a>
            <a href="/sosialisasi/logout.php" class="btn btn-danger">🚪 Logout</a>
        </div>
    </div>
</div>

</body>
</html>