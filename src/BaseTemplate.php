<?php

namespace Tamtamchik\SimpleFlash;

/**
 * Class BaseTemplate.
 *
 * @property string prefix  - line prefix
 * @property string postfix - line postfix
 * @property string wrapper - flash wrapper
 */
abstract class BaseTemplate implements TemplateInterface
{
    abstract function wrapMessages($messages, $type);

    /**
     * @param $message - message text
     *
     * @return string
     */
    public function wrapMessage($message)
    {
        return $this->getPrefix() . $message . $this->getPostfix();
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    public function getPostfix()
    {
        return $this->postfix;
    }

    /**
     * @param string $postfix
     */
    public function setPostfix($postfix)
    {
        $this->postfix = $postfix;
    }

    /**
     * @param string $wrapper
     */
    public function setWrapper($wrapper)
    {
        $this->wrapper = $wrapper;
    }

    /**
     * @return string
     */
    public function getWrapper()
    {
        return $this->wrapper;
    }

    /**
     * Check that you have add fields defined in template and throw an exception if not.
     *
     * @param $name
     *
     * @throws \Exception
     */
    public function __get($name)
    {
        throw new \Exception("No \"{$name}\" defined in template! Please, make sure you have prefix, postfix and wrapper defined!");
    }
}
