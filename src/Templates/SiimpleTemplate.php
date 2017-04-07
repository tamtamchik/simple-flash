<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class SiimpleTemplate.
 * Uses default Semantic UI markdown for flash messages.
 */
class SiimpleTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="alert alert-%s">%s</div>';

    /**
     * Override base function to suite Bootstrap 3 alert naming.
     *
     * @param $messages - message text
     * @param $type     - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'success') ? 'done' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
