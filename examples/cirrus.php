<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Cirrus CSS template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cirrus-ui@0.8.0/dist/cirrus.min.css"/>
    <style>
        /* Custom margins for Cirrus CSS toasts */
        .toast {
            margin-bottom: .5em;
        }
    </style>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="container" style="width: 600px; margin: 0 auto;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayCirrus() ?>

</div>

</body>
</html>
