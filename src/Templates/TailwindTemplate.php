<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class TailwindTemplate.
 * Uses custom Tailwind markdown for flash messages.
 */
class TailwindTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="bg-%s-300 border border-%s-400 text-%s-800 px-4 py-3 mb-3 rounded relative shadow" role="alert"">%s</div>';

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
        $type = ($type == 'warning') ? 'orange' : $type;
        $type = ($type == 'error') ? 'red' : $type;

        return sprintf($this->getWrapper(), $type, $type, $type, $messages);
    }
}
