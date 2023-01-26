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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Primer/20.8.0/primer.min.css"
          integrity="sha512-FBDbgCWjJV1M4p0eGswLLr6ba+SfiVpj4uCoj0AjzjbVSMtCtb1pH6kM5Cdgf42V1ii4QIRkHAhrn9xr0qSWmA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
