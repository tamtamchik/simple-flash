<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Bootstrap default template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"/>
</head>
<body>


<?php include_once '_ribbon.php'; ?>

<div class="container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayBootstrap() ?>
</div>

</body>
</html>
