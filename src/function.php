<?php

if ( ! function_exists('flash'))
{
  /**
   * Wrapper for flash object to be used as global function.
   * @param null $message
   * @param null $type
   *
   * @return bool|\Tamtamchik\Flash\Flash
   */
  function flash($message = null, $type = null)
  {
    $flash = new \Tamtamchik\Flash\Flash();

    if ( ! is_null($message))
    {
      if ( ! is_null($type))
      {
        return $flash->message($message, $type);
      }

      return $flash->message($message, 'info');
    }

    return $flash;
  }
}
