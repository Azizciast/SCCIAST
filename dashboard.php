<?php 
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require_once("functions.php");

$id = $_SESSION['id'];
$result = query("SELECT * FROM users WHERE id = '$id'")[0];
$name = $result['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <?php require_once('inc/link.php');?>
</head>

<body>
    
<?php require_once('inc/navbar.php');?>
</nav><br><br><br>

    <h1>Hello <?= $name; ?>,Welcome To Website Us</h1>
<?php require_once('inc/script.php');?>
</body>
</html>