<?php
require("koneksi.php");
session_start();

$nim = $_SESSION["nim"];
$query = "SELECT * FROM trashbin WHERE data = '$nim'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama = $row["nama"];
    $points = $row["points"];
} else {
    echo "Data tidak ditemukan";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $minumanId = $_POST["minuman_id"];

    $selectedMinuman = null;
    foreach ($minuman as $item) {
        if ($item['id'] == $minumanId) {
            $selectedMinuman = $item;
            break;
        }
    }
    // Tukar point
    if ($selectedMinuman) {
        $hargaPoin = $selectedMinuman['harga_poin'];
        if ($points >= $hargaPoin) {
            $newPoints = $points - $hargaPoin;
            $updateQuery = "UPDATE trashbin SET points = $newPoints WHERE data = '$nim'";
            if ($conn->query($updateQuery) === TRUE) {
                // Return a success response
                $response = array('success' => true, 'points' => $newPoints);
                echo json_encode($response);
            } else {
                // Return an error response
                $response = array('success' => false, 'message' => 'Gagal melakukan penukaran poin.');
                echo json_encode($response);
            }
            exit;
        } else {
            // Return an error response
            $response = array('success' => false, 'message' => 'Point tidak cukup');
            echo json_encode($response);
        }
    }
}

$conn->close();

?>