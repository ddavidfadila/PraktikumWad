<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$host = "localhost:3307"; 
$username = "root"; 
$password = ""; 
$database = "practicumwad"; 

$connect = mysqli_connect($host, $username, $password, $database);
// 
    if(!$connect) {
		die("Gagal terhubung".mysqli_connect_error());
	}
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya

// 
?>