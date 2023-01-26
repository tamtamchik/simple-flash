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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Halfmoon/1.1.1/css/halfmoon.min.css"
          integrity="sha512-Kaju/JzlErKhC47smofkXAdSkvILovmvh2nnok6rgN79oB3Co/T7Pm7Ns8dcpNEN3VTVZDw2ilrUDByzInEabg=="
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Halfmoon/1.1.1/js/halfmoon.min.js"
        integrity="sha512-8fN/MQrHBCMmkx2t4QwGODGHwQf8VxCeNwNkJz0gjt5JrlUfJ5zNlMr9lrzhnl7DSN+5E16YmMHnfomnQmvSoA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    // Dark mode toggle demo
    function toggleDemo () {
        halfmoon.toggleDarkMode()
    }
</script>

</body>
</html>
