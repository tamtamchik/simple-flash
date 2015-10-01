<?php

use Tamtamchik\SimpleFlash\TemplateInterface;

if ( ! function_exists('flash')) {

    /**
     * Wrapper for flash object to be used as global function.
     *
     * @param string            $message  - message text
     * @param string            $type     - message type: success, info, warning, error
     * @param TemplateInterface $template - template (optional)
     *
     * @return \Tamtamchik\SimpleFlash\Flash
     */
    function flash($message = '', $type = 'info', TemplateInterface $template = null)
    {
        $flash = new \Tamtamchik\SimpleFlash\Flash($template);

        if ( ! empty($message)) {
            return $flash->message($message, $type);
        }

        return $flash;
    }
}
