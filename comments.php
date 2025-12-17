<?php
include "config.php";
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $content = $_POST['content'] ?? '';

  // ❌ RENTAN Stored XSS + SQLi (insert mentah) — HANYA UNTUK PRAKTIKUM
  $uid = $_SESSION['user_id'];
  $sql = "INSERT INTO comments (user_id, content) VALUES ($uid, '$content')";
  mysqli_query($conn, $sql);

  header("Location: comments.php");
  exit;
}

// Reflected XSS (search)
$q = $_GET['q'] ?? '';

$list_sql = "SELECT c.*, u.username
             FROM comments c
             JOIN users u ON u.id=c.user_id
             ORDER BY c.id DESC";
$list = mysqli_query($conn, $list_sql);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Komentar</title></head>
<body>
  <h2>Komentar</h2>
  <p><a href="/">← Kembali</a></p>

  <h3>Tambah Komentar (Stored XSS)</h3>
  <form method="POST">
    <textarea name="content" rows="4" cols="60" placeholder="Tulis komentar..."></textarea><br><br>
    <button type="submit">Kirim</button>
  </form>

  <hr>
  <h3>Search (Reflected XSS)</h3>
  <form method="GET">
    <input name="q" value="<?php echo $q; ?>" placeholder="ketik lalu submit">
    <button type="submit">Cari</button>
  </form>

  <p>Hasil pencarian untuk:</p>
  <!-- ❌ RENTAN Reflected XSS: output mentah dari q -->
  <div style="padding:10px;border:1px solid #ccc;"><?php echo $q; ?></div>

  <hr>
  <h3>Daftar Komentar (Stored XSS)</h3>

  <?php while ($row = mysqli_fetch_assoc($list)): ?>
    <div style="border:1px solid #ddd;padding:10px;margin:10px 0;">
      <div><b><?php echo $row['username']; ?></b> (<?php echo $row['created_at']; ?>)</div>

      <!-- ❌ RENTAN Stored XSS: tampilkan komentar mentah -->
      <div><?php echo $row['content']; ?></div>
    </div>
  <?php endwhile; ?>

  <hr>
  <p><b>Payload uji XSS:</b></p>
  <ul>
    <li><code>&lt;script&gt;alert("XSS")&lt;/script&gt;</code></li>
    <li><code>&lt;img src=x onerror=alert("XSS")&gt;</code></li>
  </ul>
</body>
</html>
