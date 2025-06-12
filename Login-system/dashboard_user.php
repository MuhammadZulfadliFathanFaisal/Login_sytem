<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard User</title>
  <style>
    body { background: #fdf5e6; font-family: Arial; text-align: center; padding-top: 100px; }
    .box { background: #deb887; padding: 20px; border-radius: 10px; display: inline-block; }
    a { color: white; text-decoration: none; background: #8b4513; padding: 8px 15px; border-radius: 5px; }
  </style>
</head>
<body>
  <div class="box">
    <h2>Selamat Datang, <b><?= $_SESSION['username'] ?></b></h2>
    <p>Anda login sebagai User.</p>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
