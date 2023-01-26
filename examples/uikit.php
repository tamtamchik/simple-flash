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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.15.22/css/uikit.min.css"
          integrity="sha512-yM8ljS4awfnkTcISLgQMDc4Z16q3BXQC6CuiNfCvTOsX/k+awcZBcwIswyHeZVy3w/iTzZKyroHBAJocW2woKQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="uk-container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayUiKit() ?>

</div>

</body>
</html>
