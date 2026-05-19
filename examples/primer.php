<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Premier template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@primer/css@21.1.1/dist/primer.css"/>
    <style>
        /* Custom CSS for Primer flash styles separation. */
        .flash {
            margin-bottom: .5em;
        }
    </style>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="container-lg" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayPrimer() ?>
</div>

</body>
</html>
