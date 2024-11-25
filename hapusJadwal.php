<?php 
require "helper/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM `userpengangkut` WHERE id='$id'");
if(mysqli_affected_rows($koneksi) > 0){
    header("location: dashboardUser.php");
}
