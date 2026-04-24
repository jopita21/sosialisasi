<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* FONT SERAGAM */
        * {
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
            margin: 0;

            /* CENTER TENGAH LAYAR */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            width: 320px;
            padding: 25px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-group {
            display: flex;
            justify-content: center;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    <form method="POST" action="/sosialisasi/proses_login.php">
        
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <div class="btn-group">
            <button type="submit">Login</button>
        </div>

    </form>
</div>

</body>
</html>