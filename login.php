<?php 
require 'functions.php';
session_start();

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username From users Where id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }


}

if (isset($_SESSION["login"])) {
    header("Location: dashboard.php");
    exit;
}



if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // cek session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }

            header("Location: dashboard.php");
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
        <!-- NAVIGATION BAR  -->
        <div class="container-navbar">
            <ul class="ul-navbar">
           
                <li class="li-navbar">
                    <a href="register.php" class="a-navbar">REGISTER</a>
                </li>
                <li class="li-navbar">
                    <a href="login.php" class="a-navbar">LOGIN</a>
                </li>
                <li class="li-navbar">
                    <a href="admin/login.php" class="a-navbar">ADMIN</a>
                </li>
            </ul>
        </div>
    <!-- NAVIGATION BAR  -->

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style:italic;">username / password salah</p>
    <?php endif; ?>

    <h1>Login</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>

            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
            <!-- <li>
                <a href="register.php">You already to Register! </a>
            </li> -->
        </ul>
    </form>

</body>

</html>