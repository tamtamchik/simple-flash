<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class FomanticTemplate.
 * Uses default Fomantic UI markup for flash messages.
 */
class FomanticTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '<p>';
    protected $postfix = '</p>';
    protected $wrapper = '<div class="ui message %s">%s</div>';

    /**
     * @param string $messages - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages(string $messages, string $type): string
    {
        return sprintf($this->getWrapper(), $type, $messages);
    }
}
