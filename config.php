<?php
$conn = mysqli_connect("localhost", "root", "novenhysx", "kamsib");
if (!$conn) die("Koneksi gagal: " . mysqli_connect_error());

session_start();

function require_login() {
  if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
  }
}
