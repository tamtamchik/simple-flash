<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class Uikit2Template.
 * Uses default Semantic UI markdown for flash messages.
 */
class Uikit2Template extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '<p>';
    protected $postfix = '</p>';
    protected $wrapper = '<div class="uk-alert uk-alert-%s" data-uk-alert>%s</div>';

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
        $type = ($type == 'error') ? 'danger' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
