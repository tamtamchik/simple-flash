<?php

use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\Templates;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

flash()->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');

flash()->setTemplate(TemplateFactory::create(Templates::TAILWIND));

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Tailwind default template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<a href="https://github.com/tamtamchik/simple-flash"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
<br/>

<div class="container mx-auto" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash() ?>

</div>

</body>
</html>
