<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

flash()->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');

flash()->setTemplate(\Tamtamchik\SimpleFlash\TemplateFactory::create('semantic2'));

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Semantic UI 2 template.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.1.7/semantic.min.css">
</head>
<body>

<br />

<div class="ui text container">

    <?php include_once '_menu.php'; ?>

    <hr />

    <?= flash() ?>

</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/semantic-ui/2.1.7/semantic.min.js"></script>

</body>
</html>
