<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Admin</title>
  <style>
    body { background: #fdf5e6; font-family: Arial; text-align: center; padding-top: 100px; }
    .box { background: #cd853f; padding: 20px; border-radius: 10px; display: inline-block; }
    a { color: white; text-decoration: none; background: #5a3e2b; padding: 8px 15px; border-radius: 5px; }
  </style>
</head>
<body>
  <div class="box">
    <h2>Selamat Datang Admin, <b><?= $_SESSION['username'] ?></b></h2>
    <p>Ini adalah halaman khusus Admin.</p>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
