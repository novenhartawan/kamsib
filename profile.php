<?php
include "config.php";
require_login();

$id = $_GET['id'] ?? ''; // ❌ percaya input URL (IDOR demo)

$sql = "SELECT * FROM users WHERE id = $id";
$res = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($res);

if (!$user) {
  die("User tidak ditemukan. <a href='/'>Kembali</a>");
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Profil</title></head>
<body>
  <h2>Profil Pengguna</h2>

  <p><b>ID:</b> <?php echo $user['id']; ?></p>
  <p><b>Username:</b> <?php echo $user['username']; ?></p>
  <p><b>Nama:</b> <?php echo $user['full_name']; ?></p>
  <p><b>Email:</b> <?php echo $user['email']; ?></p>

  <p><a href="/">Kembali</a></p>

  <hr>
  <p><b>Uji IDOR:</b> Login sebagai <code>budi</code>, lalu ubah URL menjadi <code>?id=1</code>.</p>
</body>
</html>
