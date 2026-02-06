<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Bootstrap default template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css"
          integrity="sha512-2bBQCjcnw658Lho4nlXJcc6WkV/UxpE/sAokbXPxQNGqmNdQrWqtw26Ns9kFF/yG792pKR1Sx8/Y1Lf1XN4GKA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>


<?php include_once '_ribbon.php'; ?>

<div class="container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayBootstrap() ?>
</div>

</body>
</html>
