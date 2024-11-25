<?php
require_once "helper/koneksi.php";
session_start();

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
    <link rel="stylesheet" href="css/userPage.css">

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
                    <a href="/presentasikaryainr/dashboardAdmin.php">
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
                <h1>List User</h1>
            </div>
            <div class="mainContent">
                <table class="table">
                    <thead>
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Username</th>
                            <th>Role User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $user = mysqli_query($koneksi, "SELECT * FROM users WHERE userType = 'user'");
                    $no = 1;
                    foreach ($user as $daftarUser) :
                    ?>
                    <tbody>
                        <tr style="text-align: center">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $daftarUser['username']; ?></td>
                            <td><?php echo $daftarUser['userType']; ?></td>
                            <td class="edit"><a href="editUserPage.php?idUser=<?php echo $daftarUser['id']; ?>"><i class="fas fa-edit"></i>Edit User</a>    <a href="hapusUserPage.php?idUser=<?php echo $daftarUser['id']; ?>"><i class="fas fa-trash"></i>Hapus User</a>   <a href="tambahJadwalPage.php?idUser=<?= $daftarUser['id']?>"><i class="fas fa-pen"></i>Tambah Jadwal</a></td>
                        </tr>
                    </tbody>
                    <?php
                    endforeach;
                    $no++;
                    ?>
                </table>

            </div>
            <a href="tambahUserPage.php" class="linkTambahUser">Ingin Tambah User?</a>
        </section>
    </div>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>
</body>
</html>



