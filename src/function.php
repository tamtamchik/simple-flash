<?php

if (! function_exists('flash')) {

    /**
     * Wrapper for flash object to be used as global function.
     *
     * @package Tamtamchik\SimpleFlash
     *
     * @param string $message
     * @param string $type
     *
     * @return \Tamtamchik\SimpleFlash\Flash
     * @throws Exception
     */
    function flash($message = '', $type = 'info')
    {
        $flash = new \Tamtamchik\SimpleFlash\Flash();

        if (! empty($message)) {
            return $flash->message($message, $type);
        }

        return $flash;
    }
}
