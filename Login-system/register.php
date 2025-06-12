<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $check = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        $error = "Username sudah ada.";
    } else {
        $insert = $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
        if ($insert) {
            header("Location: login.php");
        } else {
            $error = "Gagal register.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <style>
    body { background: #f5f5dc; font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; }
    .form-box { background: #deb887; padding: 30px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
    h2 { text-align: center; color: #5a3e2b; }
    input, select { width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc; }
    button { width: 100%; padding: 10px; background: #8b4513; color: white; border: none; border-radius: 5px; cursor: pointer; }
    .message { color: red; text-align: center; }
    a { display: block; text-align: center; margin-top: 10px; color: #5a3e2b; }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Register</h2>
    <?php if (isset($error)) echo "<p class='message'>$error</p>"; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
      <button type="submit" name="register">Register</button>
    </form>
    <a href="login.php">Sudah punya akun? Login</a>
  </div>
</body>
</html>
