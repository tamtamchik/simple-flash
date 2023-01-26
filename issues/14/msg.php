<?php

use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;
use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\Templates;
use function Tamtamchik\SimpleFlash\flash;

if ( ! session_id()) {
    session_start();
}

require_once('../../vendor/autoload.php');
?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">

    <a href="create_msg.php">Create message</a>

    <h2>MESSAGES</h2>

<?php
try {
    if (flash()->some('info')) {
        echo flash()->setTemplate(TemplateFactory::create(Templates::TAILWIND))->display('info');
    }
} catch (FlashTemplateNotFoundException $e) {
    // No one cares
}
