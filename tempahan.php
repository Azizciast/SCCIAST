<?php 
require 'functions.php';

if(isset($_POST["submit"])) {
    
    if (tempah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditempah!');
            
        </script>";
    } else {
        echo "  
        <script>
        alert('data gagal ditempah!');
        
    </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempahan</title>
</head>
<body>
<h1>Tempahan</h1>

<form action="" method="post">
    <ul>
        <li>
            <label for="nama">NAMA :</label>
            <input type="text" name="nama" id="nama">
        </li>
        <li>
            <label for="gelanggang">GELANGGANG :</label>
            <input type="text" name="gelanggang" id="gelanggang">
        </li>
        <li>
            <label for="tarikh">TARIKH :</label>
            <input type="date" name="tarikh" id="tarikh">
        </li>
        <li>
            <label for="mula">MASA MULAI :</label>
            <input type="time" name="masa_mulai" id="mula">
        </li>
        <li>
            <label for="akhir">MASA BERAKHIR :</label>
            <input type="time" name="masa_berakhir" id="akhir">
        </li>
        <li>
            <button type="submit" name="submit">Tempah!</button>
        </li>
    </ul>
</form>
</body>
</html>