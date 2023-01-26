<?php

namespace Tamtamchik\SimpleFlash\Core;

class SessionManager
{
    /**
     * @var string - main session key for Flash messages.
     */
    private $key = 'flash_messages';

    public function __construct()
    {
        if ( ! array_key_exists($this->key, $_SESSION)) {
            $_SESSION[$this->key] = [];
        }
    }

    protected function getSession(): array
    {
        return $_SESSION[$this->key];
    }

    protected function setSession(array $session): void
    {
        $_SESSION[$this->key] = $session;
    }
}
