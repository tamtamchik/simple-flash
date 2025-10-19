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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.21.11/css/uikit.min.css"
          integrity="sha512-OnzL+z8yBWMnEBBo415KDF5JLIDvlBMPLnHFbCxKDyFztM0qDWLvvxpLlA2RCEFsgu6F8XDkNjdTcA6zc9A2rg=="
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
