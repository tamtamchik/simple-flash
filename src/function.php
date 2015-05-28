<?php

if (! function_exists('flash')) {

    /**
     * Wrapper for flash object to be used as global function.
     *
     * @param string $message
     * @param string $type
     *
     * @return \Tamtamchik\SimpleFlash\Flash
     * @throws Exception
     */
    function flash($message = null, $type = 'info')
    {
        $flash = new \Tamtamchik\SimpleFlash\Flash();

        if (! is_null($message)) {
            return $flash->message($message, $type);
        }

        return $flash;
    }
}
