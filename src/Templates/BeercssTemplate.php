<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class BeercssTemplate.
 * Uses default Beer CSS markup for flash messages.
 */
class BeercssTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '<span>';
    protected $postfix = '</span>';
    protected $wrapper = '<div class="%s padding round">%s</div>';

    /**
     * @param string $messages - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages(string $messages, string $type): string
    {
        $type = ($type == 'success') ? 'green' : $type;
        $type = ($type == 'info') ? 'blue' : $type;
        $type = ($type == 'warning') ? 'amber' : $type;
        $type = ($type == 'error') ? 'red' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
