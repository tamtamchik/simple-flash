<?php

use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;
use function Tamtamchik\SimpleFlash\flash;

if ( ! session_id()) {
    session_start();
}

require_once('../../vendor/autoload.php');

try {
    flash()->message('This is a info message with TailwindCSS');
} catch (FlashTemplateNotFoundException $e) {
    // No one cares
}

header('Location: msg.php');
