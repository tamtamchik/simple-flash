<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Exceptions\FlashSingletonException;

/**
 * Class Flash.
 *
 * @method static Engine message($message, $type = 'info') Base method for adding messages to flash.
 * @method static string display($type = null) Returns Bootstrap ready HTML for Engine messages.
 * @method static bool hasMessages($type = null) Returns if there are any messages in container.
 * @method static Engine clear($type = null) Clears messages from session store.
 * @method static Engine error($message) Shortcut for error message.
 * @method static Engine warning($message) Shortcut for warning message.
 * @method static Engine info($message) Shortcut for info message.
 * @method static Engine success($message) Shortcut for success message.
 * @method static Engine setTemplate(TemplateInterface $template) Change render template.
 * @method static TemplateInterface getTemplate() Get template for modifications.
 */
class Flash
{
    /**
     * Base instance of Flash engine.
     *
     * @var Engine
     */
    private static $engine;

    // Don't allow instantiation
    private function __clone() {}

    public function __sleep()
    {
        throw new FlashSingletonException('Serialization of Flash is not allowed!');
    }

    /**
     * Creates flash container from session.
     *
     * @param TemplateInterface|null $template
     * @throws Exceptions\FlashTemplateNotFoundException
     */
    public function __construct(TemplateInterface $template = null)
    {
        if ($assigned = is_null($template)) {
            $template = TemplateFactory::create();
        }

        if (!$assigned || !isset(self::$engine)) {
            self::$engine = new Engine($template);
        }
    }

    /**
     * Invoke Engine methods.
     *
     * @param string $method - method to invoke
     * @param array $arguments - arguments for method
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
     * @param string $method - method to invoke
     * @param array $arguments - arguments for method
     *
     * @return mixed
     * @throws Exceptions\FlashTemplateNotFoundException
     */
    public static function __callStatic($method, array $arguments)
    {
        new self();

        return self::invoke($method, $arguments);
    }

    /**
     * Magic methods for instances calls.
     *
     * @param string $method - method to invoke
     * @param array $arguments - arguments for method
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
     * @return string - HTML with flash messages
     */
    public function __toString()
    {
        return strval(self::$engine);
    }
}
