<?php
    require "helper/koneksi.php";
    $id = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT userpengangkut.id,  users.username AS username, userpengangkut.idPengangkut ,pengangkut.nama AS namaPengangkut, pengangkut.noPhone AS noHp, userpengangkut.jadwalPengangkut AS jadwalPengangkutan, userpengangkut.statusPengangkut AS status
    FROM userpengangkut 
    JOIN users ON userpengangkut.iduser = users.id
    JOIN pengangkut ON userpengangkut.idpengangkut = pengangkut.idPengangkut
    WHERE userpengangkut.id = '$id';");
    $user = mysqli_fetch_assoc($result);
    $ubahFormatTanggal = date("Y-m-d\TH:i", strtotime($user['jadwalPengangkutan']));
    if(isset($_POST["edit"])){
        $idPengangkut =  $_POST["idPengangkut"];
        $jadwalPengangkut = $_POST["jadwalPengangkut"];
        $statusPengangkut = $_POST["statusPengangkut"];
        $query = mysqli_query($koneksi, "UPDATE `userpengangkut` SET idPengangkut = '$idPengangkut', jadwalPengangkut = '$jadwalPengangkut', statusPengangkut = '$statusPengangkut' WHERE id = '$id';");

        if (mysqli_affected_rows ($koneksi) > 0){
            echo "<script>alert('edit sukses')</script>";
            header("location: dashboardUser.php");
        } else {
            echo "<script>alert('edit gagal')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>

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
                <label for="username">username</label>
                <input type="text" name="username" value="<?= $user['username'] ?>"" id="username" disabled>
            </div>
            <div class="textField">
                <p>Pilih Pengangkut</p>
                <select name="idPengangkut" id="idPengangkut">
                    <option value="1" <?= $user['idPengangkut'] == 1 ? 'selected' : '' ?> >Jane Smith</option>
                    <option value="2" <?= $user['idPengangkut'] == 2 ? 'selected' : '' ?> >Bob Wiliams</option>
                    <option value="3" <?= $user['idPengangkut'] == 3 ? 'selected' : '' ?> >Eva Davis</option>
                    <option value="4" <?= $user['idPengangkut'] == 4 ? 'selected' : '' ?> >Michael Brown</option>
                    <option value="5" <?= $user['idPengangkut'] == 5 ? 'selected' : '' ?> >Sophia Miller</option>
                    <option value="6" <?= $user['idPengangkut'] == 6 ? 'selected' : '' ?> >Sukirjan Bin Jamal</option>
                </select>
            </div>
            <div class="textField">
                <label for="jadwalPengangkut">Jadwal Pengangkut</label>
                <input type="datetime-local" name="jadwalPengangkut" id="jadwalPengangkut" value="<?= $ubahFormatTanggal ?>" min="<?= $ubahFormatTanggal?>" max="<?= date('Y-m-d\TH:i', strtotime($ubahFormatTanggal . '+6 day'))?>"> 
            </div>
            <div class="textField">
                <label for="statusPengangkut">Jadwal Pengangkut</label>
                <select name="statusPengangkut" id="statusPengangkut">
                    <option value="Terangkut" <?=$user['status'] == 'Terangkut' ? 'selected' : '' ?> >Terangkut</option>
                    <option value="Belum Terangkut" <?=$user['status'] == 'Belum Terangkut' ? 'selected' : '' ?> >Belum Terangkut</option>
                </select>
            </div>
            <button type="submit" name="edit">Submit</button>
            <a href="dashboardUser.php">Kembali</a>
        </form>
    </section>
</body>
</html>