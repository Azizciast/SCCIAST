<?php 
require 'functions.php';

if(isset($_POST["register"]) ) {
    if(register ($_POST) > 0 ){
        echo "<script>
        alert('user baru berhasil ditambahkan!');
        </script>";
    }else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    label {
        display: block;
    }
</style>
<body>
        <!-- NAVIGATION BAR  -->
        <div class="container-navbar">
            <ul class="ul-navbar">
                <li class="li-navbar">
                    <a href="#" class="a-navbar">HOME</a>
                </li>
                <li class="li-navbar">
                    <a href="#" class="a-navbar">ABOUT</a>
                </li>
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
    <h1>Register</h1>

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
                <label for="password2">confirm password :</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
            <!-- <li>
                <a href="login.php">You already to login! </a>
            </li> -->
        </ul>
    </form>
</body>
</html>