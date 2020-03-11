<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class BootstrapTemplate.
 * Uses default Bootstrap markdown for flash messages.
 */
class BootstrapTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="alert alert-%s" role="alert">%s</div>';

    /**
     * Override base function to suite Bootstrap 3 alert naming.
     *
     * @param $messages - message text
     * @param $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'error') ? 'danger' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
