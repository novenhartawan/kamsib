<?php
include "config.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// ❌ RENTAN SQL INJECTION (HANYA UNTUK PRAKTIKUM LOCALHOST/LAB)
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$res = mysqli_query($conn, $sql);

if ($user = mysqli_fetch_assoc($res)) {
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['username'] = $user['username'];

  header("Location: /");
  exit;
}

echo "Login gagal. <a href='login.php'>Coba lagi</a>";
