<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "mahasiswa"; 


// Menerima data dari ESP32
$data = isset($_GET["data"]) ? $_GET["data"] : "";

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) { // mengecek apakah koneksi database error
    echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error(); // pesan ketika koneksi database error
}

// Mengeksekusi query untuk mencari data di database
$sql = "SELECT * FROM trashbin WHERE data = '$data'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Mengambil baris pertama dari hasil query
    $row = $result->fetch_assoc();
    $id = $row["id"]; // Assuming the column name is "name"

    echo $id;
} else {
    // Data tidak ditemukan di database
    echo "false";
}

$conn->close();
?>
