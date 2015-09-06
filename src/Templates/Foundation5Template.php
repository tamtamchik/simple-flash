<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;

/**
 * Class Foundation5Template.
 * Use Foundation 5 markdown for flash messages.
 */
class Foundation5Template extends BaseTemplate
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
        return sprintf($this->getWrapper(), ($type == 'error') ? 'alert' : $type, $messages);
    }
}
