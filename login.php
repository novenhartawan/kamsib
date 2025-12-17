<!doctype html>
<html>
<head><meta charset="utf-8"><title>WebSec Lab - Login</title></head>
<body>
  <h2>WebSec Lab (SQLi + XSS + IDOR) - Login</h2>

  <form method="POST" action="process_login.php">
    <label>Username</label><br>
    <input name="username"><br><br>
    <label>Password</label><br>
    <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
  </form>

  <p><b>Akun uji:</b> admin/admin123, budi/budi123, siti/siti123</p>
</body>
</html>
