<?php
//cek ke database, apakah sudah ada nomor NIM yang sama
//filter data $nim
$nim = mysqli_real_escape_string($link,$nim);
$query= " SELECT * FROM mahasiswa WHERE nim='$nim'";
$hasil_query = mysqli_query($link,$query);

//cek jumlah record (baris), jika ada, $nim tidak bisa di proses
$jumlah_data - mysqli_num_rows($hasil_query);
if($jumlah_data>= 1 ) {
    $pesan_error .-"NIM yang sama sudah digunakan<br>";
}
?>