<?php namespace Tamtamchik\SimpleFlash;

/**
 * Class Engine.
 *
 * @package Tamtamchik\SimpleFlash
 */
class Engine
{

    /**
     * @var string - main session key for Flash messages.
     */
    private $key = 'flash_messages';

    private $prefix = '<p>';
    private $postfix = '</p>';
    private $wrapper = '<div class="alert alert-%s" role="alert">%s</div>';

    private $types = [
        'error',
        'warning',
        'info',
        'success',
    ];

    /**
     * Creates flash container from session.
     */
    public function __construct()
    {
        if (! array_key_exists($this->key, $_SESSION)) {
            $_SESSION[$this->key] = [];
        }
    }

    /**
     * Base method for adding messages to flash.
     *
     * @param string $message - message text
     * @param string $type    - message type: success, info, warning, danger
     *
     * @return Engine $this
     */
    public function message($message = '', $type = 'info')
    {
        if (is_array($message)) {
            foreach ($message as $issue) {
                $this->addMessage($issue, $type);
            }

            return $this;
        }

        return $this->addMessage($message, $type);
    }

    /**
     * Add message to $_SESSION.
     *
     * @param string $message
     * @param string $type
     *
     * @return Engine $this
     */
    protected function addMessage($message = '', $type = 'info')
    {
        $type = strip_tags($type);

        if (empty($message) || ! in_array($type, $this->types)) {
            return $this;
        }

        if (! array_key_exists($type, $_SESSION[$this->key])) {
            $_SESSION[$this->key][$type] = [];
        }

        $_SESSION[$this->key][$type][] = $message;

        return $this;
    }

    /**
     * Returns Bootstrap ready HTML for Engine messages.
     *
     * @param string $type
     *
     * @return string
     */
    public function display($type = null)
    {
        $result = '';

        if (! is_null($type) && ! in_array($type, $this->types)) {
            return $result;
        }

        if (in_array($type, $this->types)) {
            $result .= $this->buildMessages($_SESSION[$this->key][$type], $type);
        } elseif (is_null($type)) {
            foreach ($_SESSION[$this->key] as $messageType => $messages) {
                $result .= $this->buildMessages($messages, $messageType);
            }
        }

        $this->clear($type);

        return $result;
    }

    /**
     * Returns if there are any messages in container.
     *
     * @param string $type
     *
     * @return bool
     */
    public function hasMessages($type = null)
    {
        if (! is_null($type)) {
            return ! empty($_SESSION[$this->key][$type]);
        } else {
            foreach ($this->types as $type) {
                if (! empty($_SESSION[$this->key][$type])) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Clears messages from session store.
     *
     * @param string $type
     *
     * @return Engine $this
     */
    public function clear($type = null)
    {
        if (is_null($type)) {
            $_SESSION[$this->key] = array();
        } else {
            unset($_SESSION[$this->key][$type]);
        }

        return $this;
    }

    /**
     * Builds messages for a single type.
     *
     * @param array  $flashes
     * @param string $type
     *
     * @return string
     */
    protected function buildMessages(array $flashes, $type)
    {
        $messages = '';
        foreach ($flashes as $msg) {
            $messages .= $this->prefix . $msg . $this->postfix;
        }

        return sprintf($this->wrapper, ($type == 'error') ? 'danger' : $type, $messages);
    }

    /**
     * If requested as string will HTML will be returned.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->display();
    }

    /**
     * Shortcut for error message.
     *
     * @param $message
     *
     * @return Engine
     */
    public function error($message)
    {
        return $this->message($message, 'error');
    }

    /**
     * Shortcut for warning message.
     *
     * @param $message
     *
     * @return Engine
     */
    public function warning($message)
    {
        return $this->message($message, 'warning');
    }

    /**
     * Shortcut for info message.
     *
     * @param $message
     *
     * @return Engine
     */
    public function info($message)
    {
        return $this->message($message, 'info');
    }

    /**
     * Shortcut for success message.
     *
     * @param $message
     *
     * @return Engine
     */
    public function success($message)
    {
        return $this->message($message, 'success');
    }
}
