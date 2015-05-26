<?php namespace Tamtamchik\Flash;

use Exception;

/**
 * Class Flash
 * @package Tamtamchik
 */
class Flash {

  const SESSION_NOT_FOUND = 'Flash not initialized!';
  const NOT_VALID_TYPE    = 'is not a valid message type!';

  private $sessionKey = 'flash_messages';
  private $prefix     = "<p>";
  private $postfix    = "</p>";
  private $wrapper    = "<div class=\"alert alert-%s\" role=\"alert\">%s</div>";

  private $types = [
    'success',
    'info',
    'warning',
    'error',
  ];

  /**
   * Flash constructor.
   * Creates the session array if it does not already exist.
   */
  public function __construct()
  {
    if ( ! session_id())
      session_start();

    if ( ! array_key_exists($this->sessionKey, $_SESSION))
      $_SESSION[$this->sessionKey] = array();
  }

  /**
   * Base method for adding messages to flash.
   *
   * @param        $message - message text
   * @param string $type    - message type: success, info, warning, danger
   *
   * @return \Tamtamchik\Flash\Flash $this
   * @throws Exception
   */
  public function message($message, $type = 'info')
  {
    if ( ! isset($_SESSION[$this->sessionKey]))
      throw new Exception(self::SESSION_NOT_FOUND);

    if ( ! isset($message))
      return $this;

    $type = strip_tags($type);

    // Make sure it's a valid message type
    if ( ! in_array($type, $this->types))
      throw new Exception("'{$type}' " . self::NOT_VALID_TYPE);

    if ( ! array_key_exists($type, $_SESSION[$this->sessionKey]))
      $_SESSION[$this->sessionKey][$type] = array();

    $_SESSION[$this->sessionKey][$type][] = $message;

    return $this;
  }

  public function display($type = null)
  {
    $messages = '';
    $data     = '';

    if ( ! isset($_SESSION[$this->sessionKey]))
      throw new Exception(self::SESSION_NOT_FOUND);

    // Print a certain type of message?
    if (in_array($type, $this->types))
    {
      foreach ($_SESSION[$this->sessionKey][$type] as $msg)
      {
        $messages .= $this->prefix . $msg . $this->postfix;
      }
      $data .= sprintf($this->wrapper, ($type == 'error') ? 'danger' : $type, $messages);

      // Clear the viewed messages
      $this->clear($type);
    }
    elseif (is_null($type))
    {
      foreach ($_SESSION[$this->sessionKey] as $type => $msgArray)
      {
        $messages = '';
        foreach ($msgArray as $msg)
        {
          $messages .= $this->prefix . $msg . $this->postfix;
        }
        $data .= sprintf($this->wrapper, ($type == 'error') ? 'danger' : $type, $messages);
      }
      $this->clear();
    }
    else
    {
      return false;
    }

    return $data;
  }

  public function hasMessages($type = null)
  {
    if ( ! is_null($type))
    {
      if ( ! empty($_SESSION[$this->sessionKey][$type]))
        return true;
    }
    else
    {
      foreach ($this->types as $type)
      {
        if ( ! empty($_SESSION[$this->sessionKey][$type]))
          return true;
      }
    }

    return false;
  }

  public function clear($type = null)
  {
    if (is_null($type))
      unset($_SESSION[$this->sessionKey]);
    else
      unset($_SESSION[$this->sessionKey][$type]);

    return true;
  }

  public function __toString() { return $this->display(); }

}
