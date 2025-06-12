<?php
session_start();
include 'koneksi.php';

$error = '';

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $data = mysqli_fetch_assoc($result);

        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            if ($data['role'] == 'admin') {
                header("Location: dashboard_admin.php");
            } else {
                header("Location: dashboard_user.php");
            }
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body { background-color: #f5f5dc; font-family: Arial; }
    .container {
      width: 300px;
      margin: 100px auto;
      background-color: #deb887;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px #aaa;
    }
    input[type="text"], input[type="password"] {
      width: 100%; padding: 10px; margin-bottom: 15px;
    }
    input[type="submit"] {
      background-color: #8b4513;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
    }
    .error { color: red; text-align: center; margin-bottom: 10px; }
    a { color: #5a3e2b; text-decoration: none; display: block; text-align: center; margin-top: 10px; }
  </style>
</head>
<body>
  <div class="container">
    <h2 align="center">Login</h2>
    <?php if ($error): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="submit" name="login" value="Login" />
    </form>
    <a href="register.php">Belum punya akun?</a>
  </div>
</body>
</html>
