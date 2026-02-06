<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class CirrusTemplate.
 * Uses default Cirrus CSS markup for flash messages.
 */
class CirrusTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="toast toast--%s">%s</div>';

    /**
     * @param string $messages - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages(string $messages, string $type): string
    {
        $type = ($type == 'error') ? 'danger' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
