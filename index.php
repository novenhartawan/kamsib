<?php
include "config.php";
require_login();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Dashboard</title></head>
<body>
  <h2>Dashboard</h2>
  <p>Login sebagai: <b><?php echo $_SESSION['username']; ?></b></p>

  <ul>
    <li><a href="profile.php?id=<?php echo $_SESSION['user_id']; ?>">Profil Saya (IDOR)</a></li>
    <li><a href="comments.php">Komentar (Stored XSS + Reflected Search)</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>

  <hr>
  <p><b>Petunjuk Praktikum:</b></p>
  <ol>
    <li>Uji SQLi di login</li>
    <li>Uji IDOR: ubah parameter <code>id</code> di URL profil</li>
    <li>Uji XSS: masukkan payload script di komentar & coba fitur search</li>
  </ol>
</body>
</html>
