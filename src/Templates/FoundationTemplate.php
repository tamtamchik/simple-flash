<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;

/**
 * Class FoundationTemplate.
 * Use Foundation 5 markdown for flash messages.
 */
class FoundationTemplate extends BaseTemplate
{
    protected $prefix  = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div data-alert class="alert-box %s radius">%s</div>';

    /**
     * Override base function to suite Foundation alert naming.
     * 
     * @param $messages - message text
     * @param $type     - message type: success, info, warning, danger
     *
     * @return string
     */
    public function wrapMessages($messages, $type)
    {
        return sprintf($this->getWrapper(), ($type == 'error') ? 'alert' : $type, $messages);
    }
}
