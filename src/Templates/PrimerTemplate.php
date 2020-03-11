<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class PrimerTemplate.
 * Uses default Primer markdown for flash messages.
 */
class PrimerTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '<p>';
    protected $postfix = '</p>';
    protected $wrapper = '<div class="flash flash-%s">%s</div>';

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
        $type = ($type == 'warning') ? 'warn' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
