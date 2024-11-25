<?php
require_once "helper/koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: loginPage.php");
    exit();
}
$currentDate = date('Y-m-d');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Users</title>

    <!-- style css -->
    <link rel="stylesheet" href="css/dashboardUser.css">

    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <!-- Logo Icon -->
    <link rel="icon" href="img/logoGarbage100.png">


</head>
<body>
<div class="container">
        <nav>
            <ul>
                <li><a href="" class="logo"><img src="img/icons8-user-100.png" /><span class="nav-item">Users</span></a></li>
                <li>
                    <a href="dashboardUser.php">
                    <i class="fas fa-menorah"></i>
                    <span class="nav-item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="logOut.php" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                    </a>
                </li>
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Jadwal Pengangkutan</h1>
                <div class="profile">
                    <p>Hey, <b><?= $_SESSION['username'] ?></b> <br> <?= $_SESSION['userType'] ?></p>
                </div>
            </div>
            <div class="mainContent">
                <table class="table">
                    <thead>
                        <tr style="text-align   : center">
                            <th>No</th>
                            <th>username</th>
                            <th>jadwal Pengangkut</th>
                            <th>Nama Pengangkut</th>
                            <th>status Pengangkut</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT userpengangkut.id,  users.username AS username, pengangkut.nama AS namaPengangkut, pengangkut.noPhone AS noHp, userpengangkut.jadwalPengangkut AS jadwalPengangkutan, userpengangkut.statusPengangkut AS status
                    FROM userpengangkut 
                    JOIN users ON userpengangkut.iduser = users.id
                    JOIN pengangkut ON userpengangkut.idpengangkut = pengangkut.idPengangkut
                    WHERE users.username = '$_SESSION[username]' AND userpengangkut.jadwalPengangkut > '$currentDate';");
                    $no = 1;
                    foreach ($query as $daftarAngkutan) :
                    $nama_hari = date('l', strtotime($daftarAngkutan['jadwalPengangkutan']));
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $daftarAngkutan['username'] ?></td>
                            <td><?= $nama_hari, ", ",  $daftarAngkutan['jadwalPengangkutan'] ?></td>
                            <td><?= $daftarAngkutan['namaPengangkut'] ?></td>
                            <td><?= $daftarAngkutan['status'] ?></td>
                            <td class="edit"><a href="editJadwal.php?id=<?= $daftarAngkutan['id'] ?>"><i class="fas fa-edit"></i>Edit</a> <a href="detailPengangkut.php?id=<?= $daftarAngkutan['id'] ?>"><i class="fas fa-info-circle"></i>Detail Pengangkut</a></td>
                        </tr>
                    </tbody>
                    <?php
                    endforeach;
                    $no++;
                    ?>
                </table>
            </div>
            <section class="attendance">
                <div class="attendance-list">
                    <h1>Recap Jadwal Pengangkutan</h1>
                    <table class="table">
                        <thead>
                            <tr style="text-align: center">
                                <th>No</th>
                                <th>username</th>
                                <th>jadwal Pengangkut</th>
                                <th>Nama Pengangkut</th>
                                <th>status Pengangkut</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT userpengangkut.id,  users.username AS username, pengangkut.nama AS namaPengangkut, pengangkut.noPhone AS noHp, userpengangkut.jadwalPengangkut AS jadwalPengangkutan, userpengangkut.statusPengangkut AS status
                        FROM userpengangkut 
                        JOIN users ON userpengangkut.iduser = users.id
                        JOIN pengangkut ON userpengangkut.idpengangkut = pengangkut.idPengangkut
                        WHERE users.username = '$_SESSION[username]' AND userpengangkut.jadwalPengangkut < '$currentDate';");
                        $no = 1;
                        foreach ($query as $daftarAngkutan) :
                        $nama_hari = date('l', strtotime($daftarAngkutan['jadwalPengangkutan']));
                        ?>
                        <tbody>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $daftarAngkutan['username'] ?></td>
                                <td><?= $nama_hari, " ",  $daftarAngkutan['jadwalPengangkutan'] ?></td>
                                <td><?= $daftarAngkutan['namaPengangkut'] ?></td>
                                <td><?= $daftarAngkutan['status'] ?></td>
                                <td class="edit"><a href="hapusJadwal.php?id=<?= $daftarAngkutan['id'] ?>"><i class="fas fa-trash"></i>Hapus Jadwal</a></td>
                            </tr>
                        </tbody>
                        <?php
                        endforeach;
                        $no++;
                        ?>
                    </table>
                </div>
            </section>
        </section>
    </div>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>
</body>
</html>