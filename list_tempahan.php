<?php
session_start();


if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$id = $_SESSION['id'];


// koneksi ke database
require 'functions.php';
// ambil data dari table pelajar / query data pelajar
$tempahan = query("SELECT * FROM bookings WHERE user_id = '$id'");
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

        <table class="table table-bordered border-secondary">
            <tr>
                <th>No.</th>
                <th>Gelanggang</th>
                <th>Tarikh</th>
                <th>Status</th>
                <th>tetapan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($tempahan as $row) : ?>

                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["kategori"]; ?></td>
                    <td><?= $row["tarikh"]; ?></td>
                    <td><?= $row["status"]; ?></td>
                    <td>
                        <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" style="text-decoration: none;"><i class="bi bi-trash3-fill"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <?php require_once('inc/script.php'); ?>
</body>

</html>