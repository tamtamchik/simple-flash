<?php namespace Tamtamchik\Flash\Support;

/**
 * Class SessionTrait. Manages all connections to session.
 * @package Tamtamchik\Flash\Support
 */
trait SessionTrait {

  /**
   * @var string - main session key for Flash messages.
   */
  private $sessionKey = 'flash_messages';

  /**
   * Creates Flash messages container from $_SESSION object.
   *
   * @return array
   */
  protected function createContainer()
  {
    if ( ! array_key_exists($this->sessionKey, $_SESSION))
      $_SESSION[$this->sessionKey] = array();

    return $_SESSION[$this->sessionKey];
  }

  /**
   * Clears partially/fully $_SESSION object.
   *
   * @param string|null $type
   */
  protected function clearContainer($type)
  {
    if (is_null($type))
      unset($_SESSION[$this->sessionKey]);
    else
      unset($_SESSION[$this->sessionKey][$type]);
  }
}
