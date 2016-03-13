<?php

use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\Templates;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

flash()->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');

flash()->setTemplate(TemplateFactory::create(Templates::UIKIT2));

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Semantic UI 2 template.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/uikit/2.24.3/css/uikit.gradient.min.css">
</head>
<body>

<br/>

<div class="uk-container-center uk-width-1-3">

    <?php include_once '_menu.php'; ?>

    <hr/>

    <?= flash() ?>

</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/uikit/2.24.3/js/uikit.min.js"></script>

</body>
</html>
