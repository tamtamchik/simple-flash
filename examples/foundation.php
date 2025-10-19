<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Foundation template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.8.1/css/foundation.min.css"
          integrity="sha512-Kj5futMlD4dILh8c4f+W0oRM870yPL0OM+bRO/KrfZW3rjiSKO+OAYMTJeEYRHnC4CLm8G0VxaVYh6eo+xKqKA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="row" style="width: 600px; margin: 0 auto;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayFoundation() ?>
</div>

</body>
</html>
