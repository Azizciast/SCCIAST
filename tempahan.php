<?php
require 'functions.php';

session_start();


if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$id = $_SESSION['id'];
$result = query("SELECT * FROM users WHERE id = '$id'")[0];
$name = $result['id'];
$name2 = $result['username'];

if (isset($_POST["submit"])) {

    if (tempah($_POST) > 0) {
        echo "
        <script>
            alert('gelanggan berjaya ditempah!');
            document.location.href = 'list_tempahan.php'
            
        </script>";
    } else {
        echo "  
        <script>
        alert('gelanggan gagal ditempah!');
        
    </script>";
    }
}
$fasiliti = query("SELECT * FROM fasiliti");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempahan</title>
    <?php require_once('inc/link.php'); ?>

</head>

<body>

    <?php require_once('inc/navbar.php'); ?><br><br>

    <h1>Tempahan gelanggang</h1>

    <br>
    
    
    <?php foreach ($fasiliti as $row) : ?>
        <div class="row row-cols-3 row-cols-md-4 g-3">
            <div class="col">
                <div class="card h-100">
                    <img src="img/<?= $row['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['kategori']; ?></h5>
                        <p class="card-text"><?= $row['pesanan']; ?></p>
                    </div>
                    <div class="card-footer">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                             Tempah Sekarang!!
                        </button>
                    </div>
                </div>
            </div>
            
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Bookings</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                            
                                <ul>
                                    <li>
                                        <label for="tarikh">TARIKH :</label><br>
                                        <input type="date" name="tarikh" id="tarikh">
                                    </li>
                                </ul>
                                <input type="text" name="kategori" value="<?= $row['kategori'];?>" hidden>
                                <input type="text" name="fasiliti_id" value="<?= $row['id'];?>" hidden>
                                <input type="text" name="user_id" value="<?= $name;?>" hidden>
                                <input type="text" name="username" value="<?= $name2;?>" hidden>
                                <input type="text" name="status"  value="berjaya" hidden>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit" name="submit">Bookings now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <?php endforeach; ?>
            <?php require_once('inc/script.php'); ?>
</body>

</html>