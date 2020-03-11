<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class MaterializeTemplate.
 * Uses default Materialize markdown for flash messages.
 */
class MaterializeTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '<div>';
    protected $postfix = '</div>';
    protected $wrapper = '<div class="card-panel %s lighten-4 %s-text text-darken-4">%s</div>';

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
        $type = ($type == 'success') ? 'green' : $type;
        $type = ($type == 'info') ? 'blue' : $type;
        $type = ($type == 'warning') ? 'yellow' : $type;
        $type = ($type == 'error') ? 'red' : $type;

        return sprintf($this->getWrapper(), $type, $type, $messages);
    }
}
