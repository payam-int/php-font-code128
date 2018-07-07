<?php
include '../Code128.php';

// https://stackoverflow.com/a/4356295
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$str = utf8_encode((new Code128())->encode(generateRandomString(10)));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google fonts example</title>
    <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+128" rel="stylesheet">
</head>
<body style="padding: 48px; background-color: #fcfcfc;" onload="document.getElementById('test').focus()">
<div>
    <span style="font-size: 35pt; font-family: 'Libre Barcode 128';"><?php print $str ?></span>
</div>

<textarea placeholder="test" id="test"></textarea>
</body>
</html>