<?php 
session_start();
require_once 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // check data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        
    //     echo "
    //     <script>
    //         alert('data berhasil ditambahkan!');
    //         document.location.href = 'index.php';
    //     </script>";
    // } else {
    //     echo "  
    //     <script>
    //     alert('data gagal ditambahkan!');
    //     document.location.href = 'index.php';
    // </script>";
     }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('inc/link.php'); ?>
</head>

<body>
    <?php require_once('inc/navbar.php'); ?>

    <form class="text-center" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="kategori" >
           
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pesanan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="pesanan" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">gambar</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="gambar">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>


<?php require_once('inc/script.php'); ?>
</body>

</html>