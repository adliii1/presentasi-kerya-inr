<?php
    include "helper/koneksi.php";

    $tangkapId = $_GET["idUser"];
    if (isset($_POST["submit"])) {
        $namaPengangkut = $_POST["idPengangkut"];
        $jadwalPengangkut = $_POST["jadwalPengangkut"];

        
        $tambahJadwal = mysqli_query($koneksi, "INSERT INTO userpengangkut (`idUser`, `idPengangkut`, `jadwalPengangkut`, `statusPengangkut`) VALUES ('$tangkapId', '$namaPengangkut', '$jadwalPengangkut', 'Belum Terangkut')");
        if (mysqli_affected_rows($koneksi) > 0) {
            echo "<script>alert('Jadwal Berhasil Ditambahkan')</script>";
            header("Location: userPage.php");
        } else {
            echo "<script>alert('Jadwal Gagal Ditambahkan')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- style css -->
    <link rel="stylesheet" href="css/registerPage.css">

    <!-- Logo Icon -->
    <link rel="icon" href="img/logoGarbage100.png">

</head>
<body>
    <section class="registerPage">
        <h1>Tambah Jadwal</h1>
        <form action="" method="post">
            <div class="textField">
                <p>Pilih Pengangkut</p>
                <select name="idPengangkut" id="idPengangkut">
                    <option value="1">Jane Smith</option>
                    <option value="2">Bob Wiliams</option>
                    <option value="3">Eva Davis</option>
                    <option value="4">Michael Brown</option>
                    <option value="5">Sophia Miller</option>
                    <option value="6">Sukirjan Bin Jamal</option>
                </select>
            </div>
            <div class="textField">
                <label for="jadwalPengangkut">Jadwal Pengangkut</label>
                <input type="datetime-local" name="jadwalPengangkut" id="jadwalPengangkut" placeholder="Input Your Email" required>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
        <a href="/presentasikaryainr/userPage.php">Kembali</a>
    </section>
</body>
</html>