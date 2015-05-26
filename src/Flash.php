<?php namespace Tamtamchik\Flash;

use Exception;
use Tamtamchik\Flash\Support\SessionTrait;

/**
 * Class Flash
 * @package Tamtamchik
 */
class Flash {

  use SessionTrait;

  private $container;
  private $prefix  = "<p>";
  private $postfix = "</p>";
  private $wrapper = "<div class=\"alert alert-%s\" role=\"alert\">%s</div>";

  private $types = [
    'error',
    'warning',
    'info',
    'success',
  ];

  /**
   * Creates flash container from session.
   */
  public function __construct()
  {
    $this->container = $this->createContainer();
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
    // Do nothing if message is empty
    if ( ! isset($message))
      return $this;

    $type = strip_tags($type);

    // Make sure it's a valid message type
    if ( ! in_array($type, $this->types))
      throw new Exception("'{$type}' is not a valid message type!");

    if ( ! array_key_exists($type, $this->container))
      $this->container[$type] = array();

    $this->container[$type][] = $message;

    return $this;
  }

  /**
   * Returns Bootstrap ready HTML for Flash messages.
   *
   * @param null $type
   *
   * @return string
   */
  public function display($type = null)
  {
    $messages = '';
    $data     = '';

    if (in_array($type, $this->types))
    {
      foreach ($this->container[$type] as $msg)
      {
        $messages .= $this->prefix . $msg . $this->postfix;
      }
      $data .= sprintf($this->wrapper, ($type == 'error') ? 'danger' : $type, $messages);
    }
    elseif (is_null($type))
    {
      foreach ($this->container as $type => $msgArray)
      {
        $messages = '';
        foreach ($msgArray as $msg)
        {
          $messages .= $this->prefix . $msg . $this->postfix;
        }
        $data .= sprintf($this->wrapper, ($type == 'error') ? 'danger' : $type, $messages);
      }
    }
    $this->clear($type);

    return $data;
  }

  /**
   * Returns if there are any messages in container.
   *
   * @param null $type
   *
   * @return bool
   */
  public function hasMessages($type = null)
  {

    if ( ! is_null($type))
    {
      return ! empty($this->container[$type]);
    }
    else
    {
      foreach ($this->types as $type)
      {
        if ( ! empty($this->container[$type]))
          return true;
      }
    }

    return false;
  }

  /**
   * Clears messages from session store.
   *
   * @param null $type
   *
   * @return bool
   */
  public function clear($type = null)
  {
    $this->clearContainer($type);

    if (is_null($type))
    {
      $this->container = $this->createContainer();
    }
    else
    {
      unset($this->container[$type]);
    }

    return true;
  }

  /**
   * If requested as string will HTML will be returned.
   *
   * @return bool|string
   * @throws Exception
   */
  public function __toString() { return $this->display(); }

}
