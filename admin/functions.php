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
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
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
    mysqli_query($conn, "INSERT INTO admin VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;

    // ambil data dari tiap elemen dalam from
    $kategori = htmlspecialchars($data["kategori"]);
    $pesanan = htmlspecialchars($data["pesanan"]);


    //   upload gambar
    $gambar = upload($pesanan);
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO fasiliti
    VALUES
    ('', '$kategori', '$pesanan', '$gambar')
";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload($pesanan)
{
    global $conn;
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    $max = 1000000;
    if ($ukuranFile < $max) {
        echo "<script>
                 alert('ukuran gambar terlalu besar!');
                </script>";
        return false;
    }

    // berhasil pengecekan, gambar siap diupload
    // generate nama baru
    $namaFileBaru = $pesanan . '.' . $ekstensiGambar;
    $imgDir = '../img/';

    // Check if the file with the same name already exists
    $destination = $imgDir . $namaFileBaru;
    if (file_exists($destination)) {
        // Delete the existing file
        unlink($destination);

        // Empty gambar value in database
        emptyGambar($conn, $pesanan);
    }

    // Simpan gambar $tmpName ke directory img/ with the new file name
    // $destination = $imgDir . $namaFileBaru;

    if (move_uploaded_file($tmpName, $destination)) {
        return $namaFileBaru;
    } else {
        echo "<script>alert('Gagal menyimpan gambar!');</script>";
        return false;
    }

}

function emptyGambar($conn, $pesanan)
{
    // Query to update the gambar field to NULL or an empty value
    $query = "UPDATE pelajar SET gambar = NULL WHERE nokp = '$pesanan'";

    // Run query
    mysqli_query($conn, $query);
}

function padampelajar($conn, $id)
{

    // Get the gambar from the pelajar record
    $query = "SELECT gambar FROM fasiliti WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $imgName = $row['gambar'];

    // Delete the image associated with the nokp
    $imgDir = '../img/';
    $imgFile = $imgDir . $imgName;
    unlink($imgFile);

    // Delete the record from the database
    mysqli_query($conn, "DELETE FROM fasiliti WHERE id = $id");

    return mysqli_affected_rows($conn);
}
