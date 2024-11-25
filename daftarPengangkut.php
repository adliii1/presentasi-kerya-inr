<?php
    require "helper/koneksi.php";
    session_start();
    require_once "helper/koneksi.php";

    if (!isset($_SESSION['username'])) {
        header("Location: loginPage.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- style css -->
    <link rel="stylesheet" href="css/dashboardAdmin.css">

    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

        <!-- Logo Icon -->
        <link rel="icon" href="img/logoGarbage100.png">


</head>
<body>
<div class="container">
    <nav>
        <ul>
            <li><a href="#" class="logo"><img src="img/logo.png" /><span class="nav-item">Admin</span></a></li>
            <li>
                <a href="dashboardAdmin.php">
                <i class="fas fa-menorah"></i>
                <span class="nav-item">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="userPage.php">
                <i class="fas fa-user"></i>
                <span class="nav-item">User</span>
                </a>
            </li>
            <li>
                <a href="daftarPengangkut.php">
                <i class="fas fa-truck"></i>
                <span class="nav-item">Pengangkut</span>
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
            <h1>Daftar Pengangkut</h1>
        </div>
        <div class="mainContent">
            <table class="table">
                <thead>
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>Nama Pengangkut</th>
                        <th>No Handphone</th>
                    </tr>
                </thead>
                <?php
                $pengangkut = mysqli_query($koneksi, "SELECT * FROM pengangkut");
                $no = 1;
                foreach ($pengangkut as $daftarPengankut) :
                ?>
                <tbody>
                    <tr style="text-align: center">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $daftarPengankut['nama']; ?></td>
                        <td><?php echo $daftarPengankut['noPhone']; ?></td>
                    </tr>
                </tbody>
                <?php
                endforeach;
                ?>
            </table>
        </div>
    </section>
</div>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>
</body>
</html>