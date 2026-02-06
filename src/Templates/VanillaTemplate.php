<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class VanillaTemplate.
 * Uses default Vanilla Framework markup for flash messages.
 */
class VanillaTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="p-notification--%s"><div class="p-notification__content"><p class="p-notification__message">%s</p></div></div>';

    /**
     * @param string $messages - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages(string $messages, string $type): string
    {
        $type = ($type == 'error') ? 'negative' : $type;
        $type = ($type == 'warning') ? 'caution' : $type;
        $type = ($type == 'info') ? 'information' : $type;
        $type = ($type == 'success') ? 'positive' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
