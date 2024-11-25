<?php
require "helper/koneksi.php";
session_start();
require_once "helper/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: loginPage.php");
    exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
$result = mysqli_query($koneksi, "SELECT * FROM `blok` WHERE `idBlok`='$id'");
$tangkapValueStatus = mysqli_fetch_assoc($result);
if(isset($_POST['edit'])) {
    $newStatus = htmlspecialchars($_POST["statusPengangkut"] );
    $query = mysqli_query($koneksi, "UPDATE `blok` SET `statusPengangkut`='$newStatus' WHERE idBlok='$id'");
    if(mysqli_affected_rows($koneksi) > 0) {
        header("location: activity.php");
    }
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data</title>

    <!-- Css style -->
    <link rel="stylesheet" href="css/editDataPage.css">

    <!-- Logo Icon -->
    <link rel="icon" href="img/logoGarbage100.png">

</head>
<body>
    <div class="wrapper">
        <h1>Edit data</h1>
        <form action="" method="post">
            <label for="status">Edit Status Pengangkut</label>
            <div class="textField"> 
                <input type="radio" value="Terangkut" <?= $tangkapValueStatus['statusPengangkut'] == "Terangkut" ? "checked" : "" ?> name="statusPengangkut" id="statusTerangkut" required>
                <label for="statusTerangkut">Terangkut</label>
            </div>
            <div class="textField">
                <input type="radio" value="Belum Terangkut" <?= $tangkapValueStatus["statusPengangkut"] == "Belum Terangkut" ? "checked" : ""?> name="statusPengangkut" id="statusBelumTerangkut">
                <label for="statusBelumTerangkut">Belum Terangkut</label>
            </div>
            <button type="submit" name="edit">Submit</button>
        </form>
        <a href="/presentasikaryainr/dashboardUser.php">Kembali</a>
    </div>
</body>
</html>