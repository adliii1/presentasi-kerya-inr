<?php 
require "helper/koneksi.php";
$id = $_GET['idUser'];
// Hapus terlebih dahulu baris di tabel anak
mysqli_query($koneksi, "DELETE FROM userpengangkut WHERE idUser = '$id'");
// Kemudian, hapus baris di tabel induk
mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");
if(mysqli_affected_rows($koneksi) > 0){
    header("location: userPage.php");
}
