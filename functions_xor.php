<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>

<body>
<?php

function encryptXOR($message, $key)
{
    $message = strtoupper($message);
    $key = strtoupper($key);

    if (strlen($message) !== strlen($key)) {
        die("<p class='mt-3 alert alert-danger'>Panjang kunci harus sama dengan teks.</p>");
    }

    $encryptedText = '';

    for ($i = 0; $i < strlen($message); $i++) {
        if (ctype_alpha($message[$i])) {
            $messageChar = ord($message[$i]) - ord('A');
            $keyChar = ord($key[$i]) - ord('A');
            
            // Menggunakan operasi XOR
            $encryptedChar = $messageChar ^ $keyChar;
            $encryptedText .= chr($encryptedChar + ord('A'));
        } else {
            $encryptedText .= $message[$i];
        }
    }

    return $encryptedText;
}

function decryptXOR($encryptedText, $key)
{
    $encryptedText = strtoupper($encryptedText);
    $key = strtoupper($key);

    if (strlen($encryptedText) !== strlen($key)) {
        die("<p class='mt-3 alert alert-danger'>Panjang kunci harus sama dengan teks.</p>");
    }

    $decryptedText = '';

    for ($i = 0; $i < strlen($encryptedText); $i++) {
        if (ctype_alpha($encryptedText[$i])) {
            $encryptedChar = ord($encryptedText[$i]) - ord('A');
            $keyChar = ord($key[$i]) - ord('A');
            
            // Menggunakan operasi XOR untuk dekripsi
            $decryptedChar = $encryptedChar ^ $keyChar;
            $decryptedText .= chr($decryptedChar + ord('A'));
        } else {
            $decryptedText .= $encryptedText[$i];
        }
    }

    return $decryptedText;
}

?>
<!-- Bootstrap JS and Popper.js (for Bootstrap functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>