<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Bulma default template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/1.0.2/css/bulma.min.css"
          integrity="sha512-RpeJZX3aH5oZN3U3JhE7Sd+HG8XmuR8G5CsqIjo0OBLuU8qA/HDASi7rQlSgPqdZcT+LLmNfP7GIZRKWyLBCEw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayBulma() ?>
</div>

</body>
</html>
