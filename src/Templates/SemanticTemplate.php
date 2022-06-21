<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class SemanticTemplate.
 * Uses default Semantic UI markdown for flash messages.
 */
class SemanticTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '<p>';
    protected $postfix = '</p>';
    protected $wrapper = '<div class="ui message %s">%s</div>';

    /**
     * Override base function to suite Bootstrap 3 alert naming.
     *
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
