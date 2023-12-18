<?php

require('phpqrcode/qrlib.php');

$data = $_GET['data']; // Ambil nilai data dari URL parameter

// Konfigurasi QR code
$size = 10; // Ukuran QR code
$margin = 2; // Jarak margin

// Membuat QR code
ob_start(); // Memulai output buffering
QRcode::png($data, null, QR_ECLEVEL_L, $size, $margin); // Menghasilkan QR code dan langsung output ke output buffering
$imageData = ob_get_contents(); // Mengambil data gambar dari output buffering
ob_end_clean(); // Menghentikan dan membersihkan output buffering
?>
