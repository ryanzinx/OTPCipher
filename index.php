<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Time Pad Cipher</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h2 class="mb-4">One-Time Pad Cipher - Modulo 26 dan XOR</h2>

<form action="" method="post">
    <div class="mb-3">
        <label for="algorithm" class="form-label">Pilih Perhitungan:</label>
        <select id="algorithm" name="algorithm" class="form-select" required>
            <option value="modulo26">Modulo 26</option>
            <option value="xor">XOR</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Pesan/Teks:</label>
        <input type="text" id="message" name="message" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="key" class="form-label">Kunci (Sepanjang Teks):</label>
        <input type="text" id="key" name="key" class="form-control" required>
    </div>
    <button type="submit" name="encrypt" class="btn btn-primary">Encrypt</button>
    <button type="submit" name="decrypt" class="btn btn-secondary">Decrypt</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $algorithm = $_POST["algorithm"];
    $message = $_POST["message"];
    $key = $_POST["key"];

    if ($algorithm === "modulo26") {
        require_once("functions_mod26.php");

        if (isset($_POST["encrypt"])) {
            $encryptedText = encryptModulo26($message, $key);
            echo "<p class='mt-3 alert alert-success'>$encryptedText</p>";
        }

        if (isset($_POST["decrypt"])) {
            $decryptedText = decryptModulo26($message, $key);
            echo "<p class='mt-3 alert alert-success'>$decryptedText</p>";
        }
    } elseif ($algorithm === "xor") {
        require_once("functions_xor.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $message = $_POST["message"];
            $key = $_POST["key"];

        if (isset($_POST["encrypt"])) {
            $encryptedText = encryptXOR($message, $key);
            echo "<p class='mt-3 alert alert-success'>$encryptedText</p>";
        }
    }

        if (isset($_POST["decrypt"])) {
            $decryptedText = decryptXOR($message, $key);
            echo "<p class='mt-3 alert alert-success'>$decryptedText</p>";
        }
    }
}
?>
        </div>
    </div>
    </div>
<!-- Bootstrap JS and Popper.js (for Bootstrap functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
