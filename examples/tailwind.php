<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Tailwind default template example.</title>
    <!-- Latest compiled and minified CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="container mx-auto" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayTailwind() ?>

</div>

</body>
</html>
