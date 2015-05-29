<?php namespace Tamtamchik\SimpleFlash;

/**
 * Class Flash.
 *
 * @package Tamtamchik\SimpleFlash
 *
 * @method static Engine message($message, $type = 'info') Base method for adding messages to flash.
 * @method static string display($type = null) Returns Bootstrap ready HTML for Engine messages.
 * @method static bool hasMessages($type = null) Returns if there are any messages in container.
 * @method static Engine clear($type = null) Clears messages from session store.
 *
 * @method static Engine error($message) Shortcut for error message.
 * @method static Engine warning($message) Shortcut for warning message.
 * @method static Engine info($message) Shortcut for info message.
 * @method static Engine success($message) Shortcut for success message.
 */
class Flash
{

    /**
     * Base instance of Flash engine.
     *
     * @var Engine
     */
    private static $engine;

    public function __construct()
    {
        if (! isset(self::$engine)) {
            self::$engine = new Engine();
        }
    }

    /**
     * Invoke Engine methods.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    protected static function invoke($method, array $arguments)
    {
        $target = [
            self::$engine,
            $method,
        ];

        return call_user_func_array($target, $arguments);
    }

    /**
     * Magic methods for static calls.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic($method, array $arguments)
    {
        new self();

        return self::invoke($method, $arguments);
    }

    /**
     * Magic methods for instances calls.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($method, array $arguments)
    {
        return $this->invoke($method, $arguments);
    }

    /**
     * Mimic object __toString method.
     *
     * @return string
     */
    public function __toString()
    {
        return strval(self::$engine);
    }
}
