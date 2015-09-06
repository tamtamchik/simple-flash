<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

flash()->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Bootstrap 3 default template.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<br />

<div class="container" style="width: 600px;">

    <ul class="list-inline">
        <li><a href="/">Bootstrap 3</a></li>
        <li><a href="/foundation.php">Foundation 5</a></li>
    </ul>

    <hr />

    <?= flash() ?>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
