<?php namespace Tamtamchik\Flash;

/**
 * Class Flash
 * @package Tamtamchik
 */
class Flash {

  private $msgId;
  private $sessionKey = 'flash_messages';
  private $prefix     = "<p>";
  private $postfix    = "</p>";
  private $wrapper    = "<div class=\"alert alert-%s\" role=\"alert\">%s</div>";
  private $msgTypes   = [
    'success',
    'info',
    'warning',
    'danger',
  ];

  /**
   * @param array $options
   */
  public function __construct(Array $options = null)
  {
    if ( ! session_id())
      session_start();

    // Generate a unique ID for this user and session
    $this->msgId = md5(uniqid());

    // Create the session array if it doesn't already exist
    if ( ! array_key_exists($this->sessionKey, $_SESSION))
      $_SESSION[$this->sessionKey] = array();
  }

  public function message($message, $type)
  {
    if ( ! isset($_SESSION[$this->sessionKey]))
      //throw new Exception("Flash not initialized!");
      return false;

    if ( ! isset($type) || ! isset($message[0]))
      //throw new Exception("Not all required params specified!");
      return false;

    $type = strip_tags($type);

    // Make sure it's a valid message type
    if ( ! in_array($type, $this->msgTypes))
      //throw new Exception("'{$type}' is not a valid message type!");
      return false;

    // If the session array doesn't exist, create it
    if ( ! array_key_exists($type, $_SESSION[$this->sessionKey]))
      $_SESSION[$this->sessionKey][$type] = array();

    $_SESSION[$this->sessionKey][$type][] = $message;

    return true;
  }

  public function display($type = null, $print = false)
  {
    $messages = '';
    $data     = '';

    if ( ! isset($_SESSION[$this->sessionKey]))
      //throw new Exception("Flash not initialized!");
      return false;

    // Print a certain type of message?
    if (in_array($type, $this->msgTypes))
    {
      foreach ($_SESSION[$this->sessionKey][$type] as $msg)
      {
        $messages .= $this->prefix . $msg . $this->postfix;
      }
      $data .= sprintf($this->wrapper, $type, $messages);

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
        $data .= sprintf($this->wrapper, $type, $messages);
      }
      $this->clear();
    }
    else
    {
      return false;
    }

    if ($print)
    {
      echo $data;

      return true;
    }
    else
    {
      return $data;
    }
  }

  public function hasMessages($type = null)
  {
    if ( ! is_null($type))
    {
      if ( ! empty($_SESSION[$this->sessionKey]))
        return true;
    }
    else
    {
      foreach ($this->msgTypes as $type)
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
