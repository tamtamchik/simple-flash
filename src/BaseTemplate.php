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
    abstract public function wrapMessages(string $messages, string $type): string;

    /**
     * @param string $message - message text
     *
     * @return string
     */
    public function wrapMessage(string $message): string
    {
        return $this->getPrefix() . $message . $this->getPostfix();
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @return string
     */
    public function getPostfix(): string
    {
        return $this->postfix;
    }

    /**
     * @param string $prefix
     *
     * @return TemplateInterface $this
     */
    public function setPrefix(string $prefix): TemplateInterface
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @param string $postfix
     *
     * @return TemplateInterface $this
     */
    public function setPostfix(string $postfix): TemplateInterface
    {
        $this->postfix = $postfix;

        return $this;
    }

    /**
     * @return string
     */
    public function getWrapper(): string
    {
        return $this->wrapper;
    }

    /**
     * @param string $wrapper
     *
     * @return TemplateInterface $this
     */
    public function setWrapper(string $wrapper): TemplateInterface
    {
        $this->wrapper = $wrapper;

        return $this;
    }

    /**
     * Check that you have all fields defined in template and throw an exception if not.
     *
     * @param string $name
     *
     * @throws FlashTemplateException
     */
    public function __get(string $name): void
    {
        throw new FlashTemplateException("No \"$name\" defined in template! Please, make sure you have prefix, postfix and wrapper defined!");
    }
}
