<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class Siimple3Template.
 * Uses default Semantic UI markdown for flash messages.
 */
class Siimple3Template extends SiimpleTemplate implements TemplateInterface
{
    protected $wrapper = '<div class="siimple-alert siimple-alert--%s">%s</div>';

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
        $type = ($type == 'info') ? 'primary' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
