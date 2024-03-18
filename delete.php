<?php

require_once 'functions.php';

$id = $_GET['id'];

if (padampelajar($conn, $id) > 0) {

    echo "
        <script>
            alert('Tempahan berjaya dibatalkan!'); 
            document.location.href = 'list_tempahan.php';   
        </script>
        ";
} else {
    echo "
        <script>
            alert('Tempahan gagal dibatalkan!');    
        </script>
        ";
}
