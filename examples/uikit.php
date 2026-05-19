<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test UiKit template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.25.16/dist/css/uikit.min.css"/>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="uk-container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayUiKit() ?>

</div>

</body>
</html>
