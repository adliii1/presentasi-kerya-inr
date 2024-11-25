<?php
session_start();

include 'helper/koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $typeLogin = $_POST['typeLogin'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    // var_dump($result);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        var_dump($row);
        if (password_verify($password, $row['password']) && $row['userType'] == 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['userType'] = $row['userType'];
            header("Location: dashboardAdmin.php");            
        } else if (password_verify($password, $row['password']) && $row['userType'] == 'user') {
            $_SESSION['username'] = $username;
            $_SESSION['userType'] = $row['userType'];
            header("Location: dashboardUser.php");
        } else {
            echo "<script>alert('login gagal, username atau password anda salah')</script>";
            // header("Location: loginPage.php");
        }
        // if ($row['username'] === $username && password_verify($password, $row['password']) && $row['userType'] == 'admin') {
        //     $_SESSION['username'] = $username;
        //     $_SESSION['userType'] = $row['userType'];
        //     header("Location: dashboardAdmin.php");
        // }else if ($row['username'] === $username && password_verify($password, $row['password']) && $row['userType'] == 'user') {
        //     $_SESSION['username'] = $username;
        //     $_SESSION['userType'] = $row['userType'];
        //     header("Location: dashboardUser.php");
        // } else {
        //     echo "<script>alert('login gagal, username atau password anda salah')</script>";
        //     header("Location: loginPage.php");
        // }
    } else {
        echo "<script>alert('login gagal, username atau password anda salah')</script>";
        // header("Location: loginPage.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/loginPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <section class="loginPage">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="textField">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Input Username anda" required>
            </div>
            <div class="textField">
                <label for="password">Password</label>
                <div class="password-input-container">
                    <input type="password" name="password" id="password" placeholder="****" required>
                    <span class="show-hide-btn" onclick="togglePassword()">
                        <i class="fas fa-eye" id="showIcon"></i>
                        <i class="fas fa-eye-slash" id="hideIcon" style="display: none;"></i>
                    </span>
                </div>
            </div>

            <!-- <div class="textField">
                <p>Pilih Role anda : </p>
                <select name="typeLogin" id="typeLogin">
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                </select>
            </div> -->

            <button type="submit" name="submit">Submit</button>
        </form>
        <a href="/presentasikaryainr/landingPage.php">Kembali</a>
    </section>

    <script src="script.js"></script>
</body>

</html>