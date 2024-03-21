<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$fasiliti = query("SELECT * FROM fasiliti");
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

        <table border="1" cellpadding="10" cellspacing="0">

<tr>
    <th>No.</th>
    <th>Gambar</th>
    <th>kategori</th>
    <th>pesanan</th>
    <th>Tetapan</th>
</tr>
        <?php $i = 1; ?>
<?php foreach ($fasiliti as $row): ?>
    <tr>
        <td>
            <?= $i; ?>
        </td>
        <td><img src="../img/<?= $row['gambar']; ?>" width="45px"></td>
        <td>
            <?= $row['kategori'] ?>
        </td>
        <td>
            <?= $row['pesanan'] ?>
        </td>
        <td>
           
            <a href="delete.php?id=<?= $row['id'] ?>"
                onclick="return confirm('Adakah anda yakin untuk memadam data');"><img
                    width="25px" src="../img/delete.png"></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>

</table>
    
        <?php require_once('inc/script.php');?>
    </body>

    </html>