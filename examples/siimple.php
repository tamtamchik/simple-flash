<?php

use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\Templates;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

flash()->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');

flash()->setTemplate(TemplateFactory::create(Templates::SIIMPLE));

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Siimple template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="https://siimple.github.io/css/font.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Pacifico">
    <link rel="stylesheet" type="text/css" href="https://siimple.github.io/css/siimple.min.css">
</head>
<body>

<br/>

<div class="grid">

    <?php include_once '_menu.php'; ?>

    <hr/>

    <?= flash() ?>

</div>

<!-- Latest compiled and minified JavaScript -->

</body>
</html>
