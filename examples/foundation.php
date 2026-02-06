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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.9.0/css/foundation.min.css"
          integrity="sha512-HU1oKdPcZ02o+Wxs7Mm07gVjKbPAn3i0pyud1gi3nAFTVYAVLqe+de607xHer+p9B2I9069l3nCsWFOdID/cUw=="
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
