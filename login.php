<?php
//buat koneksi ke mysql dari file connection.php
include("connection.php");

//filter dengan mysqli_real_escape_string
$username=mysqli_real_escape_string($link,$username);
$password=mysqli_real_escape_string($link,$password);

//generate hashing
$password_sha1 = sha1($password);

//cek apakah username dan password ada di tabel admin
$query = "SELECT * FROM admin WHERE username = '$username' AND password='$password_sha1'";
$result= mysqli_query($link,$query);

if(mysqli_num_rows($result) == 0) {
    //data tidak ditemukan, buat pesan error
    $pesan_error.= "Username dan/atau password tidak sesuai";
    
}

