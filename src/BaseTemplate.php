<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateException;

/**
 * Class BaseTemplate.
 *
 * @property string prefix  - line prefix
 * @property string postfix - line postfix
 * @property string wrapper - flash wrapper
 */
abstract class BaseTemplate implements TemplateInterface
{
    /**
     * @param string $messages - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    abstract public function wrapMessages($messages, $type);

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
     *
     * @return TemplateInterface $this
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
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
     *
     * @return TemplateInterface $this
     */
    public function setPostfix($postfix)
    {
        $this->postfix = $postfix;

        return $this;
    }

    /**
     * @return string
     */
    public function getWrapper()
    {
        return $this->wrapper;
    }

    /**
     * @param string $wrapper
     *
     * @return TemplateInterface $this
     */
    public function setWrapper($wrapper)
    {
        $this->wrapper = $wrapper;

        return $this;
    }

    /**
     * Check that you have all fields defined in template and throw an exception if not.
     *
     * @param $name
     *
     * @throws FlashTemplateException
     */
    public function __get($name)
    {
        throw new FlashTemplateException("No \"{$name}\" defined in template! Please, make sure you have prefix, postfix and wrapper defined!");
    }
}
