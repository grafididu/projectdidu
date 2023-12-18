<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "mahasiswa";

// Establishing a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the nim value from the URL
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Example query to fetch data from the database using the nim value
    $query = "SELECT * FROM trashbin WHERE data = '$nim' ";
    $result = $conn->query($query);

    // Fetching data from the result set
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nim = $row['data'];
            $points = $row['points'];
            $nama = $row['nama'];
        }
    } else {
        echo "No data found.";
    }
} else {
}

$query = "SELECT * FROM minuman";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $minuman = [];
    while ($row = $result->fetch_assoc()) {
        $minuman[] = [
            'id' => $row['id'],
            'minuman' => $row['minuman'],
            'harga_poin' => $row['harga_poin']
        ];
    }
} else {
    echo "No data found.";
}
?>





