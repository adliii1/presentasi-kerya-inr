<?php
    include "helper/koneksi.php";
    // $typeLogin = "user";
    if (isset($_POST["submit"])) {
        $username = htmlspecialchars(stripslashes($_POST["username"]));
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $confirmPassword = password_hash($_POST["confirmPassword"], PASSWORD_DEFAULT);
        $typeLogin = $_POST["typeLogin"];
        
        $cekUsername = mysqli_query($koneksi, "SELECT username FROM `users` WHERE username = '$username'");
        if (mysqli_num_rows($cekUsername) > 0) {
            echo "<script>alert('Username Telah Terdaftar')</script>";
        } else {
            if (!password_verify($_POST["password"], $confirmPassword)) {
                echo "<script>alert('Password Tidak Sama')</script>";
            } else {
                $tambahData = "INSERT INTO users (`id`, `username`, `password`, `userType`) VALUES ('', '$username', '$password', '$typeLogin')";
                $feasPenambahan = mysqli_query($koneksi, $tambahData);
                echo "<script>alert('Registrasi Berhasil')</script>";
                header("Location: userPage.php");
            }
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

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Logo Icon -->
    <link rel="icon" href="img/logoGarbage100.png">

</head>
<body>
    <section class="registerPage">
        <h1>Tambah User</h1>
        <form action="" method="post">
            <div class="textField">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Input Your Email" required>
            </div>
            <div class="textField">
                <label for="password">Password</label>
                <div class="password-input-container">
                    <input type="password" name="password" id="password" placeholder="****" required>
                    <span class="show-hide-btn" onclick="togglePassword('password', 'showIcon', 'hideIcon')">
                        <i class="fas fa-eye" id="showIcon"></i>
                        <i class="fas fa-eye-slash" id="hideIcon" style="display: none;"></i>
                    </span>
                </div>
            </div>
            <div class="textField">
                <label for="confirmPassword">Confirm Password</label>
                <div class="password-input-container">
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="****" required>
                    <span class="show-hide-btn" onclick="togglePassword('confirmPassword', 'showIcon', 'hideIcon')">
                        <i class="fas fa-eye" id="showIcon"></i>
                        <i class="fas fa-eye-slash" id="hideIcon" style="display: none;"></i>
                    </span>
                </div>
            </div>
            <div class="textField">
                <p>Pilih Role anda : </p>
                <select name="typeLogin" id="typeLogin">
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
        <a href="/presentasikaryainr/userPage.php">Kembali</a>

    </section>

    <script>
        function togglePassword(inputId, showIconId, hideIconId) {
            var passwordInput = document.getElementById(inputId);
            var showIcon = document.getElementById(showIconId);
            var hideIcon = document.getElementById(hideIconId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showIcon.style.display = "none";
                hideIcon.style.display = "inline-block";
            } else {
                passwordInput.type = "password";
                showIcon.style.display = "inline-block";
                hideIcon.style.display = "none";
            }
        }
    </script>
</body>
</html>