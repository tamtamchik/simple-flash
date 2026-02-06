<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Fomantic UI template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.9.4/dist/semantic.min.css"/>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="ui text container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayFomantic() ?>

</div>

</body>
</html>
