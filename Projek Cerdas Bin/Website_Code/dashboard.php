<?php 
require("koneksi.php"); 
require("update_points.php");
require('phpqrcode/qrlib.php');

function generateQRCode($data, $outputFile)
{
    // Ukuran dan kualitas QR Code
    $size = 10;
    $margin = 1;
    $errorCorrectionLevel = 'L';

    // Membuat QR Code
    QRcode::png($data, $outputFile, $errorCorrectionLevel, $size, $margin);
}

// NIM yang ingin ditampilkan sebagai QR Code
$nimQR = isset($nim) ? $nim : '';

// Path dan nama file untuk menyimpan QR Code
$outputFile = 'qrcodes/qrcode.png';

// Memanggil fungsi untuk membuat QR Code
generateQRCode($nimQR, $outputFile);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penukaran Poin</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
<div class="text-center mt-3">
    <a href="login.php?logout=true" class="btn btn-danger">Logout</a>
</div>
<div class="container">
    <h1 class="text-center mt-3">Menu Penukaran Poin</h1>
    <div class="form-group">
        <h5 for="Id">Nama: <?php echo isset($nama) ? $nama : ''; ?></h5>
        <h5 for="data">Nim: <?php echo isset($nim) ? $nim : ''; ?></h5>
        <h5 for="point">Jumlah Poin Anda: <span id="points"><?php echo $points ?></span></h5>
    </div>
        <div class="text-center mt-3">
            <img src="qrcodes/qrcode.png" alt="QR Code" width="200">
        </div>
    <div class="row">
        <?php
        foreach ($minuman as $item) {
            $id = $item['id'];
            $minumanName = $item['minuman'];
            $hargaPoin = $item['harga_poin'];
        ?>
        <div class="col-md-3 mt-5">
            <div class="card">
                <img src="https://source.unsplash.com/1200x400/?<?php echo $minumanName ?>" class="card-img-top"
                     alt="<?php echo $minumanName; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $minumanName; ?></h5>
                    <p class="card-text">Harga : <?php echo $hargaPoin; ?> Poin</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-item-id="<?= $id ?>">Tukar Poin
                    </button>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="text-center" id="result"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Penukaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda ingin menukarkan poin Anda?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TIDAK</button>
                <button type="button" class="btn btn-primary" id="confirmButton">YA</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>

<script>
    function sendTelegramMessage(message) {
    var chatId = 'tempatsampah1111_bot'; 
    var botToken = '5871070267:AAEj0Be8Do9BNiSVKZFAejS53yZcmHUFcEE';
    var apiUrl = 'https://api.telegram.org/bot' + botToken + '/sendMessage';

    $.post(apiUrl, {
      chat_id: 5896112042,
      text: message
    }, function (data) {
      console.log('Pesan berhasil dikirim ke Telegram');
    }).fail(function (error) {
      console.error('Gagal mengirim pesan ke Telegram:', error);
    });
  }

    var selectedItemId; // To store the selected item ID

    // Event listener for the modal show event
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        selectedItemId = button.data('item-id'); // Extract the item ID from data-item-id attribute
    });

    // Event listener for the confirm button click
    $('#confirmButton').click(function () {
        // Send an AJAX request to update the points
        $.post('update_points.php', {minuman_id: selectedItemId}, function (data) {
            // Parse the JSON response
            var response = JSON.parse(data);

            // Handle the response
            if (response.success) {
                // Update the points display
                $('#points').text(response.points);

                // Show the success message
                $('#result').html('<div class="alert alert-success mt-3">Poin telah berhasil ditukarkan!</div>');

                var user = '<?php echo isset($nim) ? $nim : ''; ?>';
                var minumanName = '<?php echo $minumanName; ?>';

                sendTelegramMessage('Poin telah berhasil ditukarkan oleh pengguna: ' + user + ' untuk barang: ' + minumanName);
            } else {
                // Show the error message
                $('#result').html('<div class="alert alert-danger mt-3">Gagal melakukan penukaran poin.</div>');
            }
        });
        // Hide the modal
        $('#exampleModal').modal('hide');
    });
</script>

</body>
</html>
