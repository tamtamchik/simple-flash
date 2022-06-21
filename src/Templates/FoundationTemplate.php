<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class FoundationTemplate.
 * Uses Foundation markdown for flash messages.
 */
class FoundationTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '<p>';
    protected $postfix = '</p>';
    protected $wrapper = '<div class="callout %s">%s</div>';

    /**
     * Override base function to suite Foundation alert naming.
     *
     * @param string $messages - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages(string $messages, string $type): string
    {
        $type = ($type == 'info') ? 'primary' : $type;
        $type = ($type == 'error') ? 'alert' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
