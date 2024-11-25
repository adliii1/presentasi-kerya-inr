<?php
require_once "helper/koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: loginPage.php");
    exit();
}

$currentDate = date('Y-m-d');
?>

<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dahsboard Admin</title>
    <link rel="stylesheet" href="css/dashboardAdmin.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <!-- Logo Icon -->
    <link rel="icon" href="img/logoGarbage100.png">

</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="" class="logo"><img src="img/icons8-admin-100.png" /><span class="nav-item">Admin</span></a></li>
                <li>
                    <a href="dashboardAdmin.php">
                    <i class="fas fa-menorah"></i>
                    <span class="nav-item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/presentasikaryainr/userPage.php">
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
            <h1>Jadwal Pengangkutan Yang akan mendatang</h1>
            <div class="profile">
                <p>Hey, <b><?= $_SESSION['username'] ?></b> </p>
                <!-- <p><?= $_SESSION['role'] ?></p> -->
            </div>
        </div>
        <div class="mainContent">
            <table class="table">
                <thead>
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>Username</th>
                        <th>Jadwal Pengangkutan</th>
                        <th>Nama Pengangkut</th>
                        <th>Status Pengangkutan</th>
                    </tr>
                </thead>
                <?php
                $status = mysqli_query($koneksi, "SELECT users.username AS username, pengangkut.nama AS namaPengangkut, pengangkut.noPhone AS noHp, userpengangkut.jadwalPengangkut AS jadwalPengangkutan, userpengangkut.statusPengangkut AS status
                FROM userpengangkut 
                JOIN users ON userpengangkut.iduser = users.id
                JOIN pengangkut ON userpengangkut.idpengangkut = pengangkut.idPengangkut
                WHERE userpengangkut.jadwalPengangkut > '$currentDate'
                ;");
                $no = 1;
                foreach ($status as $daftarAngkutan) :
                ?>
                <tbody>
                <tr style="text-align: center">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $daftarAngkutan['username']; ?></td>
                    <td><?php echo $daftarAngkutan['jadwalPengangkutan']; ?></td>
                    <td><?php echo $daftarAngkutan['namaPengangkut']; ?></td>   
                    <td><?php echo $daftarAngkutan['status'];?></td>
                </tr>
                </tbody>
                <?php
                endforeach;
                $no++;
                ?>
            </table>
        </div>

        <section class="recapContent">
            <div class="recapList">
                <h1>Recap Jadwal Pengangkutan</h1>
                <table class="table">
                    <thead>
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Username</th>
                            <th>Jadwal Pengangkutan</th>
                            <th>Nama Pengangkut</th>
                            <th>Status Pengangkutan</th>
                        </tr>
                    </thead>
                    <?php
                    $status = mysqli_query($koneksi, "SELECT users.username AS username, pengangkut.nama AS namaPengangkut, pengangkut.noPhone AS noHp, userpengangkut.jadwalPengangkut AS jadwalPengangkutan, userpengangkut.statusPengangkut AS status
                    FROM userpengangkut 
                    JOIN users ON userpengangkut.iduser = users.id
                    JOIN pengangkut ON userpengangkut.idpengangkut = pengangkut.idPengangkut
                    WHERE userpengangkut.jadwalPengangkut < '$currentDate'
                    ;");
                    $no = 1;
                    foreach ($status as $daftarAngkutan) :
                    ?>
                    <tbody>
                        <tr style="text-align: center">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $daftarAngkutan['username']; ?></td>
                            <td><?php echo $daftarAngkutan['jadwalPengangkutan']; ?></td>
                            <td><?php echo $daftarAngkutan['namaPengangkut']; ?></td>   
                            <td><?php echo $daftarAngkutan['status'];?></td>
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
</body>
</html>
