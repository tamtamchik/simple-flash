<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Beer CSS template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/beercss@4.0.2/dist/cdn/beer.min.css"/>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div style="width: 600px; margin: 0 auto;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayBeercss() ?>

</div>

<script type="module" src="https://cdn.jsdelivr.net/npm/beercss@4.0.2/dist/cdn/beer.min.js"></script>

</body>
</html>
