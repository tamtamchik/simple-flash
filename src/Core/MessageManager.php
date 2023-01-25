<?php

namespace Tamtamchik\SimpleFlash\Core;

use Tamtamchik\SimpleFlash\TemplateInterface;

class MessageManager extends TemplateManager
{
    private $types = [
        'error',
        'warning',
        'info',
        'success',
    ];

    public function __construct(TemplateInterface $template)
    {
        parent::__construct($template);
    }

    /**
     * Add message to Session.
     *
     * @param string $message - message text
     * @param string $type - message type: success, info, warning, error
     */
    protected function _addMessage(string $message = '', string $type = 'info')
    {
        $session = $this->getSession();

        $type = strip_tags($type);

        if (empty($message) || ! in_array($type, $this->types)) {
            return;
        }

        if ( ! array_key_exists($type, $session)) {
            $session[$type] = [];
        }

        $session[$type][] = $message;

        $this->setSession($session);
    }

    /**
     * Builds messages for a single type.
     *
     * @param array $flashes - array of messages to show
     * @param string $type - message type: success, info, warning, error
     *
     * @return string - HTML with flash messages
     */
    protected function _compileMessage(array $flashes, string $type): string
    {
        $messages = '';
        foreach ($flashes as $msg) {
            $messages .= $this->_getTemplate()->wrapMessage($msg);
        }

        return $this->_getTemplate()->wrapMessages($messages, $type);
    }

    /**
     * Returns all messages from container.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @return bool
     */
    public function _hasMessageType(string $type): bool
    {
        return in_array($type, $this->types);
    }

    /**
     * Returns if there are any messages in container.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @return bool
     */
    public function _hasMessage(string $type = null): bool
    {
        $session = $this->getSession();

        if ( ! is_null($type)) {
            return ! empty($session[$type]);
        }

        foreach ($this->types as $type) {
            if ( ! empty($session[$type])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Clears messages from session store.
     *
     * @param string|null $type - message type: success, info, warning, error
     */
    protected function _clearMessage(string $type = null)
    {
        if (is_null($type)) {
            $this->setSession([]);
            return;
        }

        $session = $this->getSession();
        if (array_key_exists($type, $session)) {
            unset($session[$type]);
        }
        $this->setSession($session);
    }
}
