<?php

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class BadTemplate.
 */
class BadTemplate extends BaseTemplate implements TemplateInterface
{
    public function wrapMessages($messages, $type)
    {
        return sprintf($this->getWrapper(), ($type == 'error') ? 'danger' : $type, $messages);
    }
}
