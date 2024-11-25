<?php
    require "helper/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/detailPengangkut.css">

    <!-- Logo Icon -->
    <link rel="icon" href="img/logoGarbage100.png">

</head>

<body>
    <section class="container">
        <h1>Daftar Pengangkut</h1>
        <table class="table">
            <thead>
                <tr style="text-align: center">
                    <th>ID Pengangkut</th>
                    <th>Nama Pengangkut</th>
                    <th>No Handphone</th>
                </tr>
            </thead>
            <?php
            $pengangkut = mysqli_query($koneksi, "SELECT * FROM pengangkut");
            foreach ($pengangkut as $daftarPengankut) :
            ?>
            <tbody>
                <tr style="text-align: center">
                    <td><?php echo $daftarPengankut['idPengangkut'] ?></td>
                    <td><?php echo $daftarPengankut['nama']; ?></td>
                    <td><?php echo $daftarPengankut['noPhone']; ?></td>
                </tr>
            </tbody>
            <?php
            endforeach;
            ?>
        </table>
        <a href="/presentasikaryainr/dashboardUser.php">Kembali</a>
    </section>
</body>
</html>