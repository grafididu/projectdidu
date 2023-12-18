<?php
ob_start(); // Start output buffering
session_start(); // Move session_start() to the top
require("koneksi.php"); // for database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if NIM has been provided
    if (isset($_POST["nim"]) && !empty($_POST["nim"])) {
        $nim = $_POST["nim"];

        // Check NIM in the trashbin table
        $query = "SELECT * FROM trashbin WHERE data = '$nim'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Store NIM in a session variable
            $_SESSION["nim"] = $nim;
            // Redirect to dashboard.php with the NIM parameter
            header("Location: dashboard.php?nim=".$nim);
            exit;
        } else {
           echo 'NIM tidak valid';
        }
        
        $conn->close(); // Close the database connection
    }
}
ob_end_flush(); // Send output buffer to the browser

?>

<!-- Rest of your HTML code -->


<!DOCTYPE html>
<html>
    
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 400px; 
            width: 100%;
            padding: 40px;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>