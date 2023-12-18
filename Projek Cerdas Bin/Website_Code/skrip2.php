<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "mahasiswa";


// Menerima data dari ESP32
$data = isset($_GET["data"]) ? $_GET["data"] : "";
$nim = isset($_GET["nim"]) ? $_GET["nim"] : "";

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
}

// Mengeksekusi query untuk mencari data di database
$sql = "SELECT * FROM trashbin WHERE data = '$nim'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Mengambil baris pertama dari hasil query
    $row = $result->fetch_assoc();
    $points = $row["points"]; // Assuming the column name is "points"
    
    if ($data == "1") {
        $newPoints = $points + 1;
    }else {
        $newPoints = $points + 2; 
    }
    // Increment the points by 1
    
    // Update the points in the database
    $updateSql = "UPDATE trashbin SET points = '$newPoints' WHERE data = '$nim'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Points incremented \n";
        echo "Your Points Now = $newPoints";
    } else {
        echo "Error updating data: " . $conn->error;
    }
} else {
    echo "ID not found";
}

$conn->close();
?>
