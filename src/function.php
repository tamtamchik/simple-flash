<?php

if ( ! function_exists('flash')) {

    /**
     * Wrapper for flash object to be used as global function.
     *
     * @param string $message - message text
     * @param string $type    - message type: success, info, warning, error
     *
     * @throws Exception
     *
     * @return \Tamtamchik\SimpleFlash\Flash
     */
    function flash($message = '', $type = 'info')
    {
        $flash = new \Tamtamchik\SimpleFlash\Flash();

        if ( ! empty($message)) {
            return $flash->message($message, $type);
        }

        return $flash;
    }
}
