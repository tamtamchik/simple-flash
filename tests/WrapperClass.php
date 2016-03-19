<?php

use Tamtamchik\SimpleFlash\FlashInterface;

class WrapperClass
{
    public function __construct(FlashInterface $flash)
    {
        $this->flasher = $flash;
    }
}
