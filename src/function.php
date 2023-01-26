<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Core\Engine;
use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;

if ( ! function_exists('flash')) {

    /**
     * Wrapper for flash object to be used as global function.
     *
     * @param string|string[] $message - message text
     * @param string $type - message type: success, info, warning, error
     * @param TemplateInterface|null $template - template (optional)
     *
     * @return Engine|Flash
     * @throws FlashTemplateNotFoundException
     */
    function flash($message = '', string $type = 'info', TemplateInterface $template = null)
    {
        $flash = new Flash($template);

        if ( ! empty($message)) {
            return $flash->message($message, $type);
        }

        return $flash;
    }
}
