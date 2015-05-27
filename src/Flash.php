<?php namespace Tamtamchik\Flash;


/**
 * Class Flash.
 *
 * @package Tamtamchik\Flash
 *
 * @method static Engine message($message, $type = 'info') Base method for adding messages to flash.
 * @method static string display($type = null) Returns Bootstrap ready HTML for Engine messages.
 * @method static bool hasMessages($type = null) Returns if there are any messages in container.
 * @method static Engine clear($type = null) Clears messages from session store.
 */
class Flash {

  private static $engine;

  function __construct()
  {
    self::$engine = new Engine();
  }

  protected static function invoke($method, array $arguments)
  {
    $target = [
      self::$engine,
      $method,
    ];

    return call_user_func_array($target, $arguments);
  }

  function __call($method, array $arguments)
  {
    return $this->invoke($method, $arguments);
  }

  static function __callStatic($method, array $arguments)
  {
    if ( ! isset(self::$engine))
    {
      self::$engine = new Engine();
    }

    return self::invoke($method, $arguments);
  }

  public function __toString() { return strval(self::$engine); }
}
