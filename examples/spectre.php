<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Spectre.css default template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectre.css/0.5.9/spectre.min.css"
          integrity="sha512-9RIcp1f4CE6dEuYX9085tXaEbYd1ap04d2Av1ub/dwuT33WbfbHStDdQ+shKrp5wzZzleh5DOg+7ABSnaQP/nQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        /* Custom margins for Spectre.css toasts */
        .toast {
            margin-bottom: .5em;
        }
    </style>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displaySpectre() ?>

</div>

</body>
</html>
