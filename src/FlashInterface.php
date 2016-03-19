<?php

namespace Tamtamchik\SimpleFlash;

/**
 * Class Engine.
 */
interface FlashInterface
{
    /**
     * Base method for adding messages to flash.
     *
     * @param string $message - message text
     * @param string $type    - message type: success, info, warning, error
     *
     * @return Engine $this
     */
    public function message($message = '', $type = 'info');

    /**
     * Returns Bootstrap ready HTML for Engine messages.
     *
     * @param string $type - message type: success, info, warning, error
     *
     * @return string - HTML with flash messages
     */
    public function display($type = null);

    /**
     * Returns if there are any messages in container.
     *
     * @param string $type - message type: success, info, warning, error
     *
     * @return bool
     */
    public function hasMessages($type = null);

    /**
     * Clears messages from session store.
     *
     * @param string $type - message type: success, info, warning, error
     *
     * @return Engine $this
     */
    public function clear($type = null);

    /**
     * Shortcut for error message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function error($message);

    /**
     * Shortcut for warning message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function warning($message);

    /**
     * Shortcut for info message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function info($message);

    /**
     * Shortcut for success message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function success($message);
}
