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
    public function wrapMessage($message);

    /**
     * @param string $messages - messages text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages($messages, $type);

    /**
     * @return string
     */
    public function getPrefix();

    /**
     * @return string
     */
    public function getPostfix();

    /**
     * @return string
     */
    public function getWrapper();

    /**
     * @param string $prefix - default: '<p>'
     *
     * @return TemplateInterface
     */
    public function setPrefix($prefix);

    /**
     * @param string $postfix - default: '</p>';
     *
     * @return TemplateInterface
     */
    public function setPostfix($postfix);

    /**
     * @param string $wrapper - default: '<div class="alert alert-%s" role="alert">%s</div>'
     *
     * @return TemplateInterface
     */
    public function setWrapper($wrapper);
}
