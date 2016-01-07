<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

flash()->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');

flash()->setTemplate(\Tamtamchik\SimpleFlash\TemplateFactory::create('foundation5'));

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Foundation 5 template.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/5.5.3/css/foundation.min.css">
</head>
<body>

<br/>

<div class="row" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <hr />

    <?= flash() ?>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/foundation/5.5.3/js/foundation.min.js"></script>

</body>
</html>
