<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Core\Engine;
use Tamtamchik\SimpleFlash\Exceptions\FlashSingletonException;

/**
 * Class Flash.
 *
 * @method static Engine setTemplate(TemplateInterface $template) Change render template.
 * @method static TemplateInterface getTemplate() Get template for modifications.
 *
 * @method static bool some($type = null) Returns if there are any messages in container.
 * @method static Engine message($message, $type = 'info') Base method for adding messages to flash.
 * @method static Engine clear($type = null) Clears messages from session store.
 *
 * @method static Engine error($message) Shortcut for error message.
 * @method static Engine warning($message) Shortcut for warning message.
 * @method static Engine info($message) Shortcut for info message.
 * @method static Engine success($message) Shortcut for success message.
 *
 * @method static string display($type = null, $template = Templates::BASE) Returns Bootstrap ready HTML for messages.
 * @method static string displayBootstrap($type = null) Returns Bootstrap ready for messages.
 * @method static string displayFoundation($type = null) Returns Foundation ready for messages.
 * @method static string displayBulma($type = null) Returns Bulma ready HTML for messages.
 * @method static string displayMaterialize($type = null) Returns Materialize ready for messages.
 * @method static string displayTailwind($type = null) Returns Tailwind ready for messages.
 * @method static string displayPrimer($type = null) Returns Primer ready for messages.
 * @method static string displayUiKit($type = null) Returns UiKit ready for messages.
 * @method static string displaySemantic($type = null) Returns Semantic UI ready for messages.
 * @method static string displaySpectre($type = null) Returns Spectre.css ready for messages.
 * @method static string displayHalfmoon($type = null) Returns Spectre.css ready for messages.
 */
class Flash
{
    /**
     * Base instance of Flash engine.
     *
     * @var Engine
     */
    private static $engine;

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

        if ( ! $assigned || ! isset(self::$engine)) {
            self::$engine = new Engine($template);
        }
    }

    /**
     * Magic methods for static calls.
     *
     * @param string $method - method to invoke
     * @param array $arguments - arguments for method
     *
     * @return mixed
     */
    public static function __callStatic(string $method, array $arguments)
    {
        new self();

        return self::invoke($method, $arguments);
    }

    /**
     * Invoke Engine methods.
     *
     * @param string $method - method to invoke
     * @param array $arguments - arguments for method
     *
     * @return mixed
     */
    protected static function invoke(string $method, array $arguments)
    {
        return call_user_func_array([self::$engine, $method], $arguments);
    }

    /**
     * @throws FlashSingletonException
     */
    public function __sleep()
    {
        throw new FlashSingletonException('Serialization of Flash is not allowed!');
    }

    /**
     * Magic methods for instances calls.
     *
     * @param string $method - method to invoke
     * @param array $arguments - arguments for method
     *
     * @return mixed
     */
    public function __call(string $method, array $arguments)
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

    /**
     * Don't allow instantiation.
     */
    private function __clone()
    {
    }
}
