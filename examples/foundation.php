<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

flash()->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');

flash()->setTemplate(new \Tamtamchik\SimpleFlash\Templates\Foundation5Template());

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Foundation 3 default template.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css">
</head>
<body>

<br/>

<div class="row" style="width: 600px;">

    <ul class="inline-list">
        <li><a href="/">Bootstrap 3</a></li>
        <li><a href="/foundation.php">Foundation 5</a></li>
    </ul>

    <hr />

    <?= flash() ?>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation.min.js"></script>

</body>
</html>
