<?php

namespace Tamtamchik\SimpleFlash;

trait FlashStubs
{
    /**
     * Base method for adding messages to flash.
     *
     * @param string $message - message text
     * @param string $type    - message type: success, info, warning, error
     *
     * @return Engine $this
     */
    public static function message($message, $type = 'info')
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }

    /**
     * Returns Bootstrap ready HTML for Engine messages.
     *
     * @param string $type - message type: success, info, warning, error
     *
     * @return string - HTML with flash messages
     */
    public static function display($type = null)
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }

    /**
     * Returns if there are any messages in container.
     *
     * @param string $type - message type: success, info, warning, error
     *
     * @return bool
     */
    public static function hasMessages($type = null)
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }

    /**
     * Clears messages from session store.
     *
     * @param string $type - message type: success, info, warning, error
     *
     * @return Engine $this
     */
    public static function clear($type = null)
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }

    /**
     * Shortcut for error message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public static function error($message)
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }

    /**
     * Shortcut for warning message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public static function warning($message)
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }

    /**
     * Shortcut for info message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public static function info($message)
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }

    /**
     * Shortcut for success message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public static function success($message)
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }

    /**
     * Setter for $template.
     *
     * @param TemplateInterface $template
     *
     * @return Engine $this
     */
    public static function setTemplate(TemplateInterface $template)
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }

    /**
     * Getter for $template.
     *
     * @return TemplateInterface
     */
    public static function getTemplate()
    {
        return self::__callStatic(__FUNCTION__, func_get_args());
    }
}
