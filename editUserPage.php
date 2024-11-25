<?php
    require "helper/koneksi.php";
    $id = $_GET['idUser'];
    $result = mysqli_query($koneksi, "SELECT username, userType FROM `users` WHERE id = '$id'");
    $user = mysqli_fetch_assoc($result);
    if(isset($_POST["edit"])){
        $username =  htmlspecialchars($_POST["username"]);
        $userType = htmlspecialchars($_POST["userType"]);
        $query = mysqli_query($koneksi, "UPDATE `users` SET username = '$username', userType = '$userType' WHERE id = '$id';");

        if ($query) {
            $affectedRows = mysqli_affected_rows($koneksi);
            echo $affectedRows;
        }

        if (mysqli_affected_rows ($koneksi) > 0){
            header("location: userPage.php");
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
    <title>Login Page</title>

    <!-- style css -->
    <link rel="stylesheet" href="css/registerPage.css">

    <!-- Logo Icon -->
    <link rel="icon" href="img/logoGarbage100.png">

</head>
<body>
    <section class="registerPage">
        <h1>Tambah User</h1>
        <form action="" method="post">
            <div class="textField">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?= $user['username'] ?>" id="username" placeholder="Input Your Email" required>
            </div>
            <div class="textField">
                <p>Pilih Role anda : </p>
                <select name="userType" id="userType">
                    <option value="user" <?= $user['userType'] == 'user' ? 'selected' : '' ?> >User</option>
                    <option value="admin" <?= $user['userType'] == 'admin' ? 'selected' : ''?> >Admin</option>
                </select>
            </div>
            <button type="edit" name="edit">Submit</button>
        </form>
        <a href="/presentasikaryainr/userPage.php">Kembali</a>
    </section>
</body>
</html>