<?php

namespace Tamtamchik\SimpleFlash;

/**
 * Interface TemplateInterface.
 */
interface TemplateInterface
{
    /**
     * @param string $message - message text
     *
     * @return mixed
     */
    public function wrapMessage(string $message);

    /**
     * @param string $messages - messages text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages(string $messages, string $type): string;

    /**
     * @return string
     */
    public function getPrefix(): string;

    /**
     * @return string
     */
    public function getPostfix(): string;

    /**
     * @return string
     */
    public function getWrapper(): string;

    /**
     * @param string $prefix - default: '<p>'
     *
     * @return TemplateInterface
     */
    public function setPrefix(string $prefix): TemplateInterface;

    /**
     * @param string $postfix - default: '</p>';
     *
     * @return TemplateInterface
     */
    public function setPostfix(string $postfix): TemplateInterface;

    /**
     * @param string $wrapper - default: '<div class="alert alert-%s" role="alert">%s</div>'
     *
     * @return TemplateInterface
     */
    public function setWrapper(string $wrapper): TemplateInterface;
}
