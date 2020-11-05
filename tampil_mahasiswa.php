<?php
 // periksa apakah user sudah login, cek kehadiran session name 
 // jika tidak ada, redirect ke login.php
 session_start();
 if (!isset($_SESSION["nama"])) {
 header("Location: login.php");
 }
 // buka koneksi dengan MySQL
 include("connection.php");
 
 // ambil pesan jika ada 
 if (isset($_GET["pesan"])) {
 $pesan = $_GET["pesan"];
 }
 
 // cek apakah form telah di submit
 // berasal dari form pencairan, siapkan query 
 if (isset($_GET["submit"])) {
 
 // ambil nilai nama
 $nama = htmlentities(strip_tags(trim($_GET["nama"])));
 
 // filter untuk $nama untuk mencegah sql injection
 $nama = mysqli_real_escape_string($link,$nama);
 
 // buat query pencarian
 $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$nama%' ";
 $query .= "ORDER BY nama ASC";
 
 // buat pesan
 $pesan = "Hasil pencarian untuk nama <b>\"$nama\" </b>:";
 } 
 else {
 // bukan dari form pencairan
 // siapkan query untuk menampilkan seluruh data dari tabel mahasiswa
 $query = "SELECT * FROM mahasiswa ORDER BY nama ASC";
 }
 ?>