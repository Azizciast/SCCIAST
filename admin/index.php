<?php
session_start();


if (!isset($_SESSION["login"])) {
    header("Location: localhost/scciast/login.php");
    exit;
}

?>

<span style="font-family: verdana, geneva, sans-serif;">
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

        <h1>hello</h1>
    
        <?php require_once('inc/script.php');?>
    </body>

    </html>