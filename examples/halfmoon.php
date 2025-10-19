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
          integrity="sha512-jm/lwgRCyPqoZqsVzKIYkPyPy4EXRRuP2DdLiPMsWYg0lWIf9fCGxRXzxf3CjMpXKzIR+EW1EmJU9TRKHmaNig=="
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
        integrity="sha512-hLcBGEHN/bGbBXNnQjrZMR5uP3uy5TLqWR1g3r5oZz0zvCLOPh5B8rJgV/KjAo/9dHYZqvPTOlb5++hDGa+O8Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    // Dark mode toggle demo
    function toggleDemo () {
        halfmoon.toggleDarkMode()
    }
</script>

</body>
</html>
