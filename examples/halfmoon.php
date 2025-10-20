<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Halfmoon default template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Halfmoon/2.0.1/css/halfmoon.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        /* Custom margins for Halfmoon toasts */
        .alert {
            margin-bottom: .5em;
        }
    </style>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayHalfmoon() ?>

    <button class="btn btn-primary" type="button" onclick="toggleDemo()">Click me!</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Halfmoon/2.0.1/js/halfmoon.min.js"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    // Dark mode toggle demo
    function toggleDemo () {
        halfmoon.toggleDarkMode()
    }
</script>

</body>
</html>
