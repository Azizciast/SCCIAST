<?php
session_start();


if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// koneksi ke database
require 'functions.php';
// ambil data dari table pelajar / query data pelajar
$tempahan = query("SELECT * FROM bookings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai tempahan</title>
    <?php require_once('inc/link.php'); ?>
</head>

<body>
    <?php require_once('inc/navbar.php'); ?>

    <h1>Senarai Tempahan</h1>
    <style>
        .container {
            margin: auto;
            width: 50%;
            border: none;
            padding: 10px;
        }
    </style>

    <div class="container">

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Gelanggang</th>
                <th>Tarikh</th>
                <th>Masa mulai</th>
                <th>Masa berakhir</th>
                <th>tetapan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($tempahan as $row) : ?>

                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["gelanggang"]; ?></td>
                    <td><?= $row["tarikh"]; ?></td>
                    <td><?= $row["masa_mulai"]; ?></td>
                    <td><?= $row["masa_berakhir"]; ?></td>
                    <td>
                        <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" style="text-decoration: none;">batalkan tempahan</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <a href="tempahan.php" style="text-decoration: none;">Buat tempahan baru</a>
    <?php require_once('inc/script.php'); ?>
</body>

</html>