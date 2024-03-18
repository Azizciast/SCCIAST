<?php
$conn = mysqli_connect("localhost", "root", "", "scciast");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    
    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert ('username sudah terdaftar!')
        </script>";

        return false;
    }

    // cek confirm password
    if ($password !== $password2) {
        echo "<script>
        alert('confirm password tidak sesuai!');
        </script>";
        return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function tempah($data) {
    global $conn;

    // $nama = htmlspecialchars($data["nama"]);
    $gelanggang = htmlspecialchars($data["gelanggang"]);
    $tarikh = ($data["tarikh"]);
    $masa_mulai = ($data["masa_mulai"]);
    $masa_berakhir =($data["masa_berakhir"]);

    $query = "INSERT INTO bookings VALUES ('','', '$gelanggang', '$tarikh', '$masa_mulai', '$masa_berakhir')";

    $result = mysqli_query($conn,"SELECT gelanggang,tarikh FROM bookings WHERE gelanggang = '$gelanggang' AND tarikh = '$tarikh'");
    
    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert ('gelanggang ini sudah ditempah!')
        </script>";

        return false;
    }

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function padampelajar($conn, $id)
{
    // Delete the record from the database
    mysqli_query($conn, "DELETE FROM bookings WHERE id = $id");

    return mysqli_affected_rows($conn);
}