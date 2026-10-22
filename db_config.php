<?php
$host = "db";
$user = "root";
$pass = "secretpassword";
$db   = "belleza_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);
$conn    = $koneksi;

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
