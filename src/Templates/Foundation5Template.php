<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class Foundation5Template.
 * Uses Foundation 5 markdown for flash messages.
 */
class Foundation5Template extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div data-alert class="alert-box %s radius">%s</div>';

    /**
     * Override base function to suite Foundation alert naming.
     *
     * @param $messages - message text
     * @param $type     - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'error') ? 'alert' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
