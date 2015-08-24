<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Templates\DefaultTemplate;

/**
 * Class Engine.
 */
class Engine
{
    /**
     * @var string - main session key for Flash messages.
     */
    private $key = 'flash_messages';

    private $types = [
        'error',
        'warning',
        'info',
        'success',
    ];

    private $template;

    /**
     * Creates flash container from session.
     */
    public function __construct()
    {
        $this->template = new DefaultTemplate();

        if ( ! array_key_exists($this->key, $_SESSION)) {
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
     * @param string $message - message text
     * @param string $type    - message type: success, info, warning, danger
     *
     * @return Engine $this
     */
    protected function addMessage($message = '', $type = 'info')
    {
        $type = strip_tags($type);

        if (empty($message) || ! in_array($type, $this->types)) {
            return $this;
        }

        if ( ! array_key_exists($type, $_SESSION[$this->key])) {
            $_SESSION[$this->key][$type] = [];
        }

        $_SESSION[$this->key][$type][] = $message;

        return $this;
    }

    /**
     * Returns Bootstrap ready HTML for Engine messages.
     *
     * @param string $type - message type: success, info, warning, danger
     *
     * @return string - HTML with flash messages
     */
    public function display($type = null)
    {
        $result = '';

        if ( ! is_null($type) && ! in_array($type, $this->types)) {
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
     * @param string $type - message type: success, info, warning, danger
     *
     * @return bool
     */
    public function hasMessages($type = null)
    {
        if ( ! is_null($type)) {
            return ! empty($_SESSION[$this->key][$type]);
        } else {
            foreach ($this->types as $type) {
                if ( ! empty($_SESSION[$this->key][$type])) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Clears messages from session store.
     *
     * @param string $type - message type: success, info, warning, danger
     *
     * @return Engine $this
     */
    public function clear($type = null)
    {
        if (is_null($type)) {
            $_SESSION[$this->key] = [];
        } else {
            unset($_SESSION[$this->key][$type]);
        }

        return $this;
    }

    /**
     * Builds messages for a single type.
     *
     * @param array  $flashes - array of messages to show
     * @param string $type    - message type: success, info, warning, danger
     *
     * @return string - HTML with flash messages
     */
    protected function buildMessages(array $flashes, $type)
    {
        $messages = '';
        foreach ($flashes as $msg) {
            $messages .= $this->template->wrapMessage($msg);
        }

        return $this->template->wrapMessages($messages, $type);
    }

    /**
     * If requested as string will HTML will be returned.
     *
     * @return string - HTML with flash messages
     */
    public function __toString()
    {
        return $this->display();
    }

    /**
     * Shortcut for error message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function error($message)
    {
        return $this->message($message, 'error');
    }

    /**
     * Shortcut for warning message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function warning($message)
    {
        return $this->message($message, 'warning');
    }

    /**
     * Shortcut for info message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function info($message)
    {
        return $this->message($message, 'info');
    }

    /**
     * Shortcut for success message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function success($message)
    {
        return $this->message($message, 'success');
    }

    /**
     * @param TemplateInterface $template
     *
     * @return Engine $this
     */
    public function setTemplate(TemplateInterface $template)
    {
        $this->template = $template;

        return $this;
    }
}
